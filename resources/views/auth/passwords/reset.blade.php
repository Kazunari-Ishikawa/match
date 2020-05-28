@extends('layouts.app')

@section('description')
<meta name="description" content="matchworksのパスワードの再設定ページです。">
@endsection

@section('keywords')
<meta name="keywords" content="パスワード, 再設定">
@endsection

@section('title')
<title>パスワードの再設定 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<section class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">パスワードの再設定</h2>
  </div>

  <div class="l-container__body l-container__body--form">
    <form action="{{ route('password.update') }}" method="POST" class="c-form">
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">

      <div class="c-form__group">
        <label for="email" class="c-form__label">メールアドレス</label>
        @error('email')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('email') isInvalid @enderror" type="email" id="email" name="email" value="{{ $email ?? old('email') }}">
      </div>

      <div class="c-form__group">
        <label for="password" class="c-form__label">新しいパスワード</label>
        @error('password')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('password') isInvalid @enderror" type="password" id="password" name="password" placeholder="8〜16文字の半角英数字">
      </div>

      <div class="c-form__group">
        <label for="password_confirmation" class="c-form__label">パスワード（再入力）</label>
        <input class="c-form__input" type="password" id="password_confirmation" name="password_confirmation">
      </div>

      <input class="c-btn c-btn--full" type="submit" value="変更する">

    </form>
  </div>

</section>

@endsection
