@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/check.css') }}">
@endsection

@section('content')
<h1 class="check-ttl">お問い合わせ</h1>
<form action="/check" method="POST">
  @csrf
  <div class="contact-check">
    <div class="content">
      <div class="check-item">
        <p class="check-item-label">お名前</p>
        <div class="check-item-container">
          <p class="check-item-content">{{$last_name}} {{$first_name}}</p>
        </div>
      </div>
      <div class="check-item">
        <p class="check-item-label">性別</p>
        @if($radio == 1)
          <div class="check-item-container">
            <p class="check-item-content">男性</p>
          </div>
        @elseif($radio == 2)
          <div class="check-item-container">
            <p class="check-item-content">女性</p>
          </div>
        @endif
      </div>
      <div class="check-item">
        <p class="check-item-label">メールアドレス</p>
        <div class="check-item-container">
          <p class="check-item-content">{{$email}}</p>
        </div>
      </div>
      <div class="check-item">
        <p class="check-item-label">郵便番号</p>
        <div class="check-item-container">
          <p class="check-item-content">{{$postcode}}</p>
        </div>
      </div>
      <div class="check-item">
        <p class="check-item-label">住所</p>
        <div class="check-item-container">
          <p class="check-item-content">{{$address}}</p>
        </div>
      </div>
      <div class="check-item">
        <p class="check-item-label">建物名</p>
        <div class="check-item-container">
          <p class="check-item-content">{{$building}}</p>
        </div>
      </div>
      <div class="check-item">
        <p class="check-item-label">ご意見</p>
        <div class="check-item-container">
          <p class="check-item-content">{{$opinion}}</p>
        </div>
      </div>
      <button type="submit" class="check-btn" value="true">確認</button>
      <div class="correct-container">
        <a href="{{ url('/')}}" class="correct-contact" name="back" value="true">修正する</a>
      </div>
    </div>
  </div>
</form>
@endsection