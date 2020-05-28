@extends('layouts.app')

@section('description')
<meta name="description" content="サーバーでエラーが発生しました。">
@endsection

@section('title')
<title>500 - サーバーでエラーが発生しました。</title>
@endsection

@section('content')
<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body">
    <div class="c-errorPage">
      <h2 class="c-errorPage__title">500 Internal Server Error</h2>
      <p class="c-errorPage__message">サーバーでエラーが発生しました。</p>

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
