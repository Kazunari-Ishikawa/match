@extends('layouts.app')

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
        <img src="/storage/img/icons/{{$user->icon}}" alt="アイコン" class="p-userDetail__img">
        @else
        <img src="{{asset('/images/icon_sample.png')}}" alt="アイコン" class="p-userDetail__img">
        @endif
      </div>
      <p class="p-userDetail__name">{{ $user->name }}</p>
    </a>

    <boards-list></boards-list>

  </section>

</div>

@endsection
