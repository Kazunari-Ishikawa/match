@extends('layouts.app')

@section('content')

<header class="l-header">
  <div class="l-header--left">
    <a class="l-header__title" href="/">
      <h1>match</h1>
    </a>
    <form action="login.html" class="c-search">
      <input type="text" class="c-search__input" placeholder="キーワードを入力">
      <div class="c-search__btn"><i class="fas fa-search"></i></div>
    </form>
  </div>
  <div class="l-header--right">
    <nav class="l-nav">
      <ul class="c-nav">
        <li class="c-nav__item c-nav__item--btn"><a class="c-nav__link c-nav__link--btn" href="{{route('register')}}">会員登録</a>
        </li>
        <li class="c-nav__item c-nav__item--btn"><a class="c-nav__link c-nav__link--btn" href="{{route('login')}}">ログイン</a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- ハンバーガーメニュー -->
  <div class="c-triggerMenu">
    <span class="c-triggerMenu__bar"></span>
    <span class="c-triggerMenu__bar"></span>
    <span class="c-triggerMenu__bar"></span>
  </div>

</header>

<!-- メインコンテンツ -->
<main id="main" class="l-main">

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
</main>

@endsection
