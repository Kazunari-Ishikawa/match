@extends('layouts.app')

@section('content')
<div class="l-container">


  <!-- メインコンテンツ -->
  <section class="l-container__body">
    <div class="c-errorPage">
      <h2 class="c-errorPage__title">404 Not Found</h2>
      <p class="c-errorPage__message">該当アドレスのページを見つけることができませんでした。</p>

      @guest
      <p class="c-errorPage__link"><a href="/">TOPページへ戻る</a></p>
      @endguest

      @auth
      <p class="c-errorPage__link"><a href="/mypage">マイページへ戻る</a></p>
      @endauth

    </div>
  </section>

</div>

@endsection
