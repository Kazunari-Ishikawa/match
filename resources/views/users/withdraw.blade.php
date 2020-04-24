@extends('layouts.app')

@section('content')

<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <h2 class="c-mypage__title">退会の確認</h2>

    <div class="c-contents">
      <p class="c-mypage__text">退会すると全ての情報が削除されます。<br>よろしければ、以下のボタンを押してください。</p>
      <p class="c-mypage__text">ご利用ありがとうございました。</p>

      <div class="c-btn__container">
        <a href="{{ route('withdraw') }}" class="c-btn c-btn--em" onclick="event.preventDefault(); document.getElementById('withdrawBtn').submit();">退会する</a>
        <form action="{{route('withdraw')}}" method="POST" id="withdrawBtn" style="display: none;">
          @csrf
        </form>
      </div>

    </div>
  </section>

</div>

@endsection
