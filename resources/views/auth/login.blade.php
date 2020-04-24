@extends('layouts.app')

@section('content')

<section class="l-container">
  <div class="l-container__header">
    <h2 class="l-container__title">ログイン</h2>
  </div>

  <div class="l-container__body l-container__body--form">
    <form method="POST" action="{{ route('login') }}" class="c-form">
      @csrf

      @foreach($errors->all() as $error)
      <span class="c-form__error">{{ $error }}</span>
      @endforeach

      <div class="c-form__group">
        <input class="c-form__input" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
      </div>

      <div class="c-form__group">
        <input class="c-form__input" type="password" id="password" name="password" placeholder="パスワード">
      </div>

      <div class="c-form__group">
        <input class="c-btn c-btn--full" type="submit" value="ログイン">
      </div>

      <p class="c-form__link">
        <a href="{{ route('password.request') }}">パスワードを忘れてしまった方はこちら</a>
      </p>
      <p class="c-form__link">
        <a href="{{route('login')}}">会員登録をしていない方はこちら</a>
      </p>
    </form>
  </div>
</section>

@endsection
