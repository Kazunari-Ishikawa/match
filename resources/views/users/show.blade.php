@extends('layouts.app')

@section('description')
<meta name="description" content="{{ $user->name }}さんのプロフィールです。">
@endsection

@section('keywords')
<meta name="keywords" content="ユーザー, プロフィール">
@endsection

@section('title')
<title>{{ $user->name }}さん - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <p class="c-form__text"><a href="{{ url()->previous('/') }}">前ページへ戻る</a></p>

    <!-- ユーザー詳細 -->
    <div class="p-userDetail">
      <div class="p-userDetail__icon">
        @if ($user->icon)
        <img src="/storage/img/icons/{{$user->icon}}" alt="アイコン" class="p-userDetail__img">
        @else
        <img src="{{asset('/images/icon_sample.png')}}" alt="アイコン" class="p-userDetail__img">
        @endif
      </div>
      <p class="p-userDetail__name">{{ $user->name }}</p>

      @if ($user->profile)
      <p class="p-userDetail__profile">{{ $user->profile }}</p>
      @else
      <p class="p-userDetail__profile">まだ自己紹介文がありません。</p>
      @endif
    </div>

  </div>
</section>

@endsection
