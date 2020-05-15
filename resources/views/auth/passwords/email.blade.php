@extends('layouts.app')

@section('content')

<section class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">パスワード再設定の手続き</h2>
  </div>

  <div class="l-container__body l-container__body--form">
    <form method="POST" action="{{ route('password.email') }}" class="c-form">
      @csrf

      <p class="c-form__text">メールアドレスを入力してください。<br>
        パスワードを変更するための確認メールを送ります。</p>

      <div class="c-form__group">
        @error('email')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <input class="c-form__input @error('email') isInvalid @enderror " type="email" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
      </div>

      <input class="c-btn c-btn--full" type="submit" value="送信する">

    </form>
  </div>
</section>

@endsection
