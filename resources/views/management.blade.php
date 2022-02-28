@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/management.css') }}">
@endsection

@section('content')
<h1 class="management-ttl">管理システム</h1>
<div class="search">
  <div class="search-container">
    <form action="/management/serch" name="form" method="GET">
      @csrf
      <div class="form-item">
        <div class="form-item-container">
          <p class="form-item-label">お名前</p>
          <input
            id="fullname"
            type="text"
            name="fullname"
            class="form-item-input"
            value="{{ old('fullname') }}"
            >
        </div>
        <div class="form-item-container__radio">
          <p class="form-item-label__radio">性別</p>
          <div class="radio-container">
          <label class="radio-input">
            <input
              class="radio-input__input"
              type="radio"
              name="radio"
              checked="checked"
              value="1" {{ old('radio') == 1 ? 'checked' : '' }}>
            <span class="radio-input__dummy-input"></span>
            <span class="radio-input__label-text">全て</span>
          </label>
          <label class="radio-input">
            <input
              class="radio-input__input"
              type="radio"
              name="radio"
              value="2" {{ old('radio') == 2 ? 'checked' : '' }}>
            <span class="radio-input__dummy-input"></span>
            <span class="radio-input__label-text">男性</span>
          </label>
          <label class="radio-input">
            <input
              class="radio-input__input"
              type="radio"
              name="radio"
              value="3" {{ old('radio') == 3 ? 'checked' : '' }}>
            <span class="radio-input__dummy-input"></span>
            <span class="radio-input__label-text">女性</span>
          </label>
        </div>
      </div>
      <div class="form-item-date">
        <div class="form-item-container">
          <p class="form-item-label">登録日</p>
          <input
            id="from_date"
            type="text"
            name="from_date"
            class="form-item-input__date"
            value="{{ old('from_date') }}"
            placeholder="2020-01-01"
            >
        </div>
        <div class="form-item-container">
          <p class="form-item-label__range">~</p>
          <input
            id="to_date"
            type="text"
            name="to_date"
            class="form-item-input__date"
            value="{{ old('to_date') }}"
            placeholder="2020-03-01"
            >
          </div>
        </div>
        <div class="form-item-email">
          <div class="form-item-container">
            <p class="form-item-label">メールアドレス</p>
            <input
              id="email"
              type="text"
              name="email"
              class="form-item-input"
              value="{{ old('email') }}"
              >
          </div>
        </div>
        <div class="serch-submit">
          <button type="submit" class="search-btn" value="true">検索</button>
        </div>
        <div class="correct-container">
          <a href="{{ url('/management')}}" class="correct-contact" name="back" value="true">リセット</a>
        </div>
      </div>
    </form>
  </div>
  <div>
  {{$items->appends(request()->input())->links('vendor.pagination.mypagination') }}
  </div>
  <table class="table">
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th></th>
    </tr>
    @foreach($items as $item)
    <tr class="table-td">
      <td>
        {{ $item->id }}
      </td>
      <td>
        {{ $item->fullname }}
      </td>
      @if($item->gender == 1)
      <td>男性</td>
      @elseif($item->gender == 2)
      <td>女性</td>
      @endif
      <td>
        {{ $item->email }}
      </td>
      <td id="{{$item->id}}" class="opinion" onmouseover="FullOpinion()" onmouseout="RestoreOpinion()">
        {{ $item->opinion }}
      </td>
      <form action="/management/delete" name="form-delete" method="POST">
      @csrf
      <td>
        <input type="hidden" name="id" value="{{ $item->id }}"/>
        <button type="submit" class="delete-btn">削除</button>
      </td>
      </form>
    </tr>
    @endforeach
  </table>
</div>

<script src="{{ mix('js/fixDate.js') }}"></script>
<script>
const array = @json($items);
window.addEventListener('DOMContentLoaded',function substrOpinion(){
  for (let i = 0; i < 35; i++){
    if(document.getElementById(i+1) != null){
      var ele = document.getElementById(i+1);
      ele.innerHTML.length <= 25 ? ele.innerHTML: (ele.innerHTML = ele.innerHTML.substr(0,25)+"...");
    }
  }
})

function FullOpinion(){
  var eleId = event.target.id;

  for (let i = 0; i < array.data.length; i++){
    if(array.data[i].id == eleId){
      var fullEle = array.data[i].opinion;
      var ele = document.getElementById(eleId);

      ele.innerHTML = fullEle;
    }
  }
}

function RestoreOpinion(){
  var eleId = event.target.id;
  var ele = document.getElementById(eleId);
  ele.innerHTML.length <= 25 ? ele.innerHTML: (ele.innerHTML = ele.innerHTML.substr(0,25)+"...");
}
</script>
@endsection