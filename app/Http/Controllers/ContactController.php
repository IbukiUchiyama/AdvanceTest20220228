<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('contact');
        return view('index',[$data]);
    }
    public function toCheckContact(ClientRequest $request)
    {
        $contact = $request->safe()->only([
            'last_name',
            'first_name',
            'radio',
            'email',
            'postcode',
            'address',
            'building',
            'opinion'
        ]);
        $request->session()->put('contact',$contact);
        $request->flash();
        return view('check',$contact);
    }

    public function check(Request $request)
    {
        return view('check');
    }
    public function regist(Request $request)
    {
        if($request->get('back')){
            return redirect('index')->withInput();
        }
        $form = $request->session()->get('contact');
        $name = [
            'last_name' => $form['last_name'],
            'first_name' => $form['first_name']
        ];
        $fullname = implode(' ',$name);
        Contact::create([
            'fullname' => $fullname,
            'gender' => $form['radio'],
            'email' => $form['email'],
            'postcode' => $form['postcode'],
            'address' => $form['address'],
            'building_name' => $form['building'],
            'opinion' => $form['opinion'],
        ]);
        return view('thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
    public function toHome()
    {
        return view('index');
    }

    public function management(Request $request)
    {
        $items = Contact::Paginate(10);
        $request->flush();
        return view('management', ['items' => $items]);
    }
    public function searchContact(Request $request)
    {
        $query = Contact::query();

        $s_fullname = $request->input('fullname');
        $s_radio = $request->input('radio');
        $s_from_date = $request->input('from_date');
        $s_to_date = $request->input('to_date');
        $s_email = $request->input('email');

        if(!empty($s_fullname)){
            $spaceConversion = mb_convert_kana($s_fullname,'s');
            $wordArrayFullname = preg_split('/[\s,]+/',$spaceConversion,-1,PREG_SPLIT_NO_EMPTY);
            foreach($wordArrayFullname as $value){
                $query->where('fullname','like','%'.$value.'%');
            }
            $items = $query->Paginate(10);
        }


        if($s_radio == 1){
            $items = $query->Paginate(10);
        } else if($s_radio == 2){
            $query->where('gender',1);
            $items = $query->Paginate(10);
        } else {
            $query->where('gender',2);
            $items = $query->Paginate(10);
        }


        if(!empty($s_from_date) && strlen($s_from_date) == 12){
            $query->where('created_at','>=',$s_from_date);
            $items = $query->Paginate(10);
        }

        if(!empty($s_to_date) && strlen($s_from_date) == 12){
            $query->where('created_at','<=',$s_to_date);
            $items = $query->Paginate(10);
        }

        if(!empty($s_email)){
            $spaceConversion = mb_convert_kana($s_email,'s');
            $wordArrayFullname = preg_split('/[\s,]+/',$spaceConversion,-1,PREG_SPLIT_NO_EMPTY);
            foreach($wordArrayFullname as $value){
                $query->where('email','like','%'.$value.'%');
            }
            $items = $query->Paginate(10);
        }

        if(!empty($items)){
            $request->flash();
            logger('#####',['items'=>$items]);
            return view('management',['items' => $items]);
        } else {
            $items = Contact::Paginate(10);
            return view('management',['items' => $items]);
        }
    }

    public function contactDelete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/management');
    }
}
