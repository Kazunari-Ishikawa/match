@extends('layouts.app')

@section('description')
<meta name="description" content="matchworksのマイページです。matchworksとは、IT系の仕事探しや仕事を依頼したい方々向けに、かんたん3ステップで繋げるビジネスマッチングサービスです。">
@endsection

@section('keywords')
<meta name="keywords" content="マイページ">
@endsection

@section('title')
<title>マイページ - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <!-- プロフィール -->
    <a class="p-userDetail" href="{{ route('users.show', $user->id) }}">
      <div class="p-userDetail__icon">
        @if ($user->icon)
        <img src="{{asset('/storage/img/icons/'.$user->icon)}}" alt="アイコン" class="p-userDetail__img">
        @else
        <img src="{{asset('/images/icon_sample.png')}}" alt="アイコン" class="p-userDetail__img">
        @endif
      </div>
      <p class="p-userDetail__name">{{ $user->name }}</p>
    </a>

    <board-list></board-list>

  </section>

</div>

@endsection
