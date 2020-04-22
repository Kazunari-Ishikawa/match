@extends('layouts.app')

@section('content')

<header class="l-header">
  <div class="l-header--left">
    <a class="l-header__title" href="index.html">
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
        <li class="c-nav__item c-nav__item--btn"><a class="c-nav__link c-nav__link--btn" href="register.html">会員登録</a>
        </li>
        <li class="c-nav__item c-nav__item--btn"><a class="c-nav__link c-nav__link--btn" href="login.html">ログイン</a>
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
      <form action="" class="c-form">
        <div class="c-form__group">
          <p class="c-form__error"></p>
          <input class="c-form__input" type="email" id="email" name="email" placeholder="メールアドレス">
        </div>
        <div class="c-form__group">
          <p class="c-form__error"></p>
          <input class="c-form__input" type="password" id="password" name="password" placeholder="パスワード">
        </div>
        <div class="c-form__group">
          <p class="c-form__error"></p>
          <input class="c-form__input" type="password" id="password_confirmation" name="password_confirmation" placeholder="パスワード（再入力）">
        </div>
        <input class="c-btn c-btn--full" type="submit" value="会員登録">
      </form>
    </div>
  </section>
</main>

<!-- フッター -->
<footer id="footer" class="l-footer">
  <div class="l-footer__body">
    <p class="l-footer__text">&copy; 2020 match All Rights Reserved.</p>
  </div>
</footer>

@endsection
