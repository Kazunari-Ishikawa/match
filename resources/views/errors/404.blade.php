@extends('layouts.app')

@section('description')
<meta name="description" content="お探しのページは見つかりませんでした。">
@endsection

@section('title')
<title>404 - お探しのページは見つかりませんでした。</title>
@endsection

@section('content')
<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body">
    <div class="c-errorPage">
      <h2 class="c-errorPage__title">404 Not Found</h2>
      <p class="c-errorPage__message">お探しのページは見つかりませんでした。<br>アドレスが間違っているか、ページが移動した可能性があります。</p>

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
