@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/thanks.css') }}">
@endsection

@section('content')
<div class="container">
  <form action="/thanks" method="POST">
    @csrf
    <div class="content">
      <p class="thanks-text">ご意見いただきありがとうございました。</p>
      <input type="submit" class="to-top-btn" value="トップページへ">
    </div>
  </form>
</div>
@endsection