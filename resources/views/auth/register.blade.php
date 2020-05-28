@extends('layouts.app')

@section('description')
<meta name="description" content="matchworksの会員登録ページです。matchworksとは、IT系の仕事探しや仕事を依頼したい方々向けに、かんたん3ステップで繋げるビジネスマッチングサービスです。">
@endsection

@section('keywords')
<meta name="keywords" content="会員登録">
@endsection

@section('title')
<title>会員登録 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<section class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">会員登録</h2>
  </div>

  <div class="l-container__body l-container__body--form">
    <form method="POST" action="{{ route('register') }}" class="c-form">
      @csrf

      <div class="c-form__group">
        <label for="email" class="c-form__label">メールアドレス</label>
        @error('email')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('email') isInvalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例：example@match.co.jp">
      </div>

      <div class="c-form__group">
        <label for="password" class="c-form__label">パスワード</label>
        @error('password')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('password') isInvalid @enderror" type="password" id="password" name="password" placeholder="8〜16文字の半角英数字">
      </div>

      <div class="c-form__group">
        <label for="password_confirmation" class="c-form__label">パスワード（再入力）</label>
        <input class="c-form__input" type="password" id="password_confirmation" name="password_confirmation">
      </div>
      <input class="c-btn c-btn--full" type="submit" value="会員登録">
    </form>
  </div>
</section>

@endsection
