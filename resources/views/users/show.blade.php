@extends('layouts.app')

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <p class="c-form__text"><a href="{{ url()->previous('/') }}">前ページへ戻る</a></p>

    <!-- ユーザー詳細 -->
    <div class="p-profile">
      <div class="p-profile__icon">
        @if ($user->icon)
        <img src="/storage/img/icons/{{$user->icon}}" alt="アイコン" class="p-profile__img">
        @else
        <img src="{{asset('/images/icon_sample.png')}}" alt="アイコン" class="p-profile__img">
        @endif
      </div>
      <p class="p-profile__name">{{ $user->name }}</p>

      @if ($user->profile)
      <p class="p-profile__content">{{ $user->profile }}</p>
      @else
      <p class="p-profile__content">まだ自己紹介文がありません。</p>
      @endif
    </div>

    <!-- 登録案件一覧 -->
    {{-- <works-list :list-title='@json("依頼した案件")'></works-list> --}}

  </div>
</section>

@endsection
