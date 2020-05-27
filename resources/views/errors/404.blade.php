@extends('layouts.app')

@section('content')
<div class="l-container">


  <!-- メインコンテンツ -->
  <section class="l-container__body">

    <p>存在しないページです。</p>

    @guest
    <p class="c-form__link"><a href="/">TOPページへ戻る</a></p>
    @endguest

    @auth
    <p class="c-form__link"><a href="/mypage">マイページへ戻る</a></p>
    @endauth

  </section>

</div>

@endsection
