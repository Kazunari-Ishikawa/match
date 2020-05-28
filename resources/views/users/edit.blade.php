@extends('layouts.app')

@section('description')
<meta name="description" content="プロフィール編集ページです。">
@endsection

@section('keywords')
<meta name="keywords" content="マイページ">
@endsection

@section('title')
<title>プロフィール編集 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <h2 class="c-settings__title">プロフィール編集</h2>

    <div class="c-settings__contents">
      <form action="{{ route('users.edit') }}" method="POST" enctype="multipart/form-data" class="c-form">
        @csrf

        <div class="c-form__group">
          <label for="name">ユーザー名（20文字まで）</label>
          @error('name')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <input type="text" class="c-form__input" name="name" id="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="c-form__group">
          <label for="email">メールアドレス</label>
          @error('email')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <input type="email" class="c-form__input" name="email" id="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="c-form__group">
          <label for="icon">アイコン（1MB以内。縦横150px以上の正方形を推奨）</label>
          @error('icon')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <label class="c-form__group--drop">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <input type="file" class="c-form__file js-preview-input" name="icon" id="icon" accept="image/*" />
            <img src="@if($user->icon){{ asset('/storage/img/icons/'.$user->icon) }}@endif" class="c-form__preview js-preview">
            ファイルを選択
          </label>
        </div>

        <div class="c-form__group">
          <label for="profile">自己紹介</label>
          @error('profile')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <textarea name="profile" id="profile" class="c-form__textarea">{{ old('profile', $user->profile) }}</textarea>
        </div>

        <div class="c-form__group">
          <input type="submit" class="c-btn c-btn--full" value="編集する">
        </div>

        <p class="c-form__link">
          <a href="{{route('withdraw')}}">matchを退会する</a>
        </p>

      </form>
    </div>
  </section>
</div>

@endsection
