@extends('layouts.app')

@section('description')
<meta name="description" content="認証に失敗しました。">
@endsection

@section('title')
<title>401 - 認証に失敗しました。</title>
@endsection

@section('content')
<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body">
    <div class="c-errorPage">
      <h2 class="c-errorPage__title">401 Unauthorized</h2>
      <p class="c-errorPage__message">認証に失敗しました。このページを見るにはログインが必要です。</p>

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
