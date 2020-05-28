@extends('layouts.app')

@section('description')
<meta name="description" content="アクセスできません。">
@endsection

@section('title')
<title>503 - アクセスできません。</title>
@endsection

@section('content')
<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body">
    <div class="c-errorPage">
      <h2 class="c-errorPage__title">503 Service Unavailable</h2>
      <p class="c-errorPage__message">このページは一時的にアクセスできません。時間を置いてからお試しください。</p>

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
