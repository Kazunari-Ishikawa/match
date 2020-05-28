@extends('layouts.app')

@section('description')
<meta name="description" content="退会確認ページです。">
@endsection

@section('keywords')
<meta name="keywords" content="退会">
@endsection

@section('title')
<title>退会の確認 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <h2 class="c-settings__title">退会の確認</h2>

    <div class="c-settings__contents">
      <form action="{{ route('withdraw') }}" method="POST" class="c-form">
        @csrf
        <p class="c-settings__text">退会すると全ての情報が削除されます。<br>よろしければ、以下のボタンを押してください。</p>
        <p class="c-settings__text">ご利用ありがとうございました。</p>

        <input type="submit" class="c-btn c-btn--em" value="退会する">

      </form>
    </div>

  </section>
</div>

@endsection
