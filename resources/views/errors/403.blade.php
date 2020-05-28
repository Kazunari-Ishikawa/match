@extends('layouts.app')

@section('description')
<meta name="description" content="アクセス権がありません。">
@endsection

@section('title')
<title>403 - アクセス権がありません。</title>
@endsection

@section('content')
<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body">
    <div class="c-errorPage">
      <h2 class="c-errorPage__title">403 Forbidden</h2>
      <p class="c-errorPage__message">このページへのアクセス権がありません。</p>

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
