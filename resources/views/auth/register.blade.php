@extends('layouts.app')

@section('content')

<section class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">会員登録</h2>
  </div>

  <div class="l-container__body l-container__body--form">
    <form method="POST" action="{{ route('register') }}" class="c-form">
      @csrf

      <div class="c-form__group">
        @error('email')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
      </div>

      <div class="c-form__group">
        @error('password')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="パスワード">
      </div>

      <div class="c-form__group">
        <input class="c-form__input" type="password" id="password_confirmation" name="password_confirmation" placeholder="パスワード（再入力）">
      </div>
      <input class="c-btn c-btn--full" type="submit" value="会員登録">
    </form>
  </div>
</section>

@endsection
