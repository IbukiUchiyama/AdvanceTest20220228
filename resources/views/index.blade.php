@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('content')

<h1 class="form-ttl">お問い合わせ</h1>
<div class="contact-form">
  @if (count($errors) > 0)
    <p class="error-ttl">※入力に問題があります</p>
  @endif
  <form action="/" class="form" name="contact" method="POST">
    @csrf
    <div class="form-item">
      <p class="form-item-label">お名前</p>
      <div class="form-item-container">
        <div class="form-item__name">
          <div>
            <p id="error-last_name__length" class="error">
              <span>30文字以内で記入してください。</span>
            <p>
            <p id="error-last_name__null" class="error">
              <span>必須入力項目です。</span>
            <p>
            <p id="error-first_name__length" class="error__first-name">
              <span>30文字以内で記入して下さい。</span>
            <p>
            <p id="error-first_name__null" class="error__first-name">
              <span>必須入力項目です。</span>
            <p>
          </div>
          <input
            id="last_name"
            type="text"
            name="last_name"
            class="form-item-input__name"
            value="{{ old('last_name') }}"
            required
            >
          <input
            id="first_name"
            type="text"
            name="first_name"
            class="form-item-input__name"
            value="{{ old('first_name') }}"
            required
            >
        </div>
        <div class="form-item__name">
          <p class="form-item-example__name">例）山田</p>
          <p class="form-item-example__name">例）太郎</p>
        </div>
      </div>
    </div>
    @error('last_name')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    @error('first_name')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    <div class="form-item">
      <p class="form-item-label">性別</p>
      <div class="radio-container">
        <label class="radio-input">
          <input
            class="radio-input__input"
            type="radio"
            name="radio"
            checked="checked"
            value="1" {{ old('radio') == 1 ? 'checked' : '' }}>
          <span class="radio-input__dummy-input"></span>
          <span class="radio-input__label-text">男性</span>
        </label>
        <label class="radio-input">
          <input
            class="radio-input__input"
            type="radio"
            name="radio"
            value="2" {{ old('radio') == 2 ? 'checked' : '' }}>
          <span class="radio-input__dummy-input"></span>
          <span class="radio-input__label-text">女性</span>
        </label>
      </div>
    </div>
    @error('radio')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    <div class="form-item">
      <p class="form-item-label">メールアドレス</p>
      <div class="form-item-container">
        <div>
          <p id="error-email__null" class="error">
            <span>必須入力項目です。</span>
          <p>
          <p id="error-email__not-email" class="error">
            <span>E-mail形式で入力して下さい。</span>
          <p>
        </div>
        <input
          id="email"
          type="email"
          name="email"
          class="form-item-input"
          value="{{ old('email') }}"
          required
          >
        <p class="form-item-example">例）test@example.com</p>
      </div>
    </div>
    @error('email')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    <div class="form-item">
      <p class="form-item-label">郵便番号</p>
      <div class="form-item-container">
        <div class="form-item-postcode-container">
          <p id="error-postcode__null" class="error__postcode">
            <span>必須入力項目です。</span>
          <p>
          <p id="error-postcode__not-postcode" class="error__postcode">
            <span>「-」を含めた8桁の郵便番号を入力して下さい。</span>
          <p>
          <p class="form-item-postmark">〒</p>
          <input
            id="postcode"
            type="text"
            name="postcode"
            class="form-item-input__postcode"
            value="{{ old('postcode') }}"
            maxlength="8"
            onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"
            required
            >
        </div>
        <div class="form-item__postcode">
          <p type="hidden" class="form-item-example__postcode">例）123-4567</p>
        </div>
      </div>
    </div>
    @error('postcode')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    <div class="form-item">
      <p class="form-item-label">住所</p>
      <div class="form-item-container">
        <p id="error-address__null" class="error">
          <span>必須入力項目です。</span>
        <p>
        <input
          id="address"
          type="text"
          name="address"
          class="form-item-input"
          value="{{ old('address') }}"
          required
          >
        <p class="form-item-example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
      </div>
    </div>
    @error('address')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    <div class="form-item">
      <p class="form-item-label__build">建物名</p>
      <div class="form-item-container">
        <input
          type="text"
          name="building"
          class="form-item-input"
          value="{{ old('building') }}">
        <p class="form-item-example">例）千駄ヶ谷マンション101</p>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">ご意見</p>
      <div class="form-item-container">
        <p id="error-opinion__null" class="error">
          <span>必須入力項目です。</span>
        <p>
        <p id="error-opinion__length" class="error">
          <span>120文字以内で記入して下さい。</span>
        <p>
        <textarea
          id="opinion"
          name="opinion"
          class="form-item-textarea"
          >{{ old('opinion') }}</textarea>
        <p class="textarea-strLen">
          <span id="opinion-length">0</span>文字/120文字
        </p>
      </div>
    </div>
    @error('opinion')
    <p class="error-message">*{{ $message }}</p>
    @enderror
    <input
      type="submit"
      class="form-btn"
      value="確認"
      required
      >
  </form>
</div>
<script src="{{ mix('js/fixString.js') }}"></script>
<script src="{{ mix('js/realTimeVal.js') }}"></script>
<script src="{{ mix('js/countString.js') }}"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endsection