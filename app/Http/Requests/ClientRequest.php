<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == '/'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'required|max:30',
            'first_name' => 'required|max:30',
            'radio' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|size:8',
            'address' => 'required',
            'building' => 'nullable',
            'opinion' => 'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'last_name.required' => '苗字を入力してください',
            'last_name.max' => '苗字は30文字以内で入力してください',
            'first_name.required' => '名前を入力してください',
            'first_name.max' => '名前は30文字以内で入力してください',
            'radio.required' => '性別を選んでください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力して下さい',
            'postcode.size' => '郵便番号は「-」を含めた8文字で入力して下さい',
            'address.required' => '住所を入力して下さい',
            'opinion.required' => 'ご意見を入力して下さい',
            'opinion.max' => 'ご意見は120文字以内で入力して下さい'
        ];
    }
}
