<!-- ヘッダー -->
<header class="l-header">

  <a class="l-header__title" href="/">
    <h1>match</h1>
  </a>

  <!-- ハンバーガーメニュー -->
  <div class="c-menuTrigger js-header-trigger">
    <span class="c-menuTrigger__bar"></span>
    <span class="c-menuTrigger__bar"></span>
    <span class="c-menuTrigger__bar"></span>
  </div>

  <nav class="l-nav js-header-toggle-target">
    <!-- PC向けメニュー -->
    <!-- 未ログイン時 -->
    @guest
    <ul class="c-menu">
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.index') }}">案件を探す</a></li>
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('register') }}">会員登録</a></li>
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('login') }}">ログイン</a></li>
    </ul>
    @endguest

    <!-- ログイン時 -->
    @auth
    <ul class="c-menu">
      <li class="c-menu__item"><a class="c-menu__link" href="{{route('users.mypage')}}">マイページ</a></li>
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.index') }}">案件を探す</a>
      </li>
      <li class="c-menu__item">
        <a href="{{'logout'}}" class="c-menu__link" onclick="event.preventDefault();
            document.getElementById('logoutHeader').submit();">ログアウト</a>
        <form id="logoutHeader" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
    <!-- スマホ向けメニュー -->
    {{-- <ul class="c-spMenu">
      <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.mypage')}}">マイページ</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.new') }}">案件を登録する</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.registered') }}">登録した案件一覧</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.applied') }}">応募している案件一覧</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.closed') }}">成約済み案件一覧</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.bookmarks') }}">気になるリスト</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('comments.index') }}">コメントした案件一覧</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('messages.index') }}">ダイレクトメッセージ一覧</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.edit') }}">プロフィール編集</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.editPassword')}}">パスワード変更</a></li>
    <li class="c-spMenu__item"><a class="c-spMenu__link" href="">ヘルプ</a></li>
    <li class="c-menu__item c-menu__item--side">
      <a href="{{'logout'}}" class="c-menu__link c-menu__link--side" onclick="event.preventDefault();
            document.getElementById('logoutForm').submit();">ログアウト</a>
      <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
    </ul> --}}
    @endauth
  </nav>

</header>

{{-- <!-- ヘッダー -->
<header class="l-header">

  <div class="l-header--left">
    <a class="l-header__title" href="/">
      <h1>match</h1>
    </a>
    <form action="" class="c-search">
      <input type="text" class="c-search__input" placeholder="キーワードを入力">
      <div class="c-search__btn"><i class="fas fa-search"></i></div>
    </form>
  </div>

  <div class="l-header--right">
    <nav class="l-nav js-header-toggle-target">
      <!-- PC向けメニュー -->
      <!-- 未ログイン時 -->
      @guest
      <ul class="c-menu">
        <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.index') }}">案件を探す</a></li>
<li class="c-menu__item"><a class="c-menu__link" href="{{ route('register') }}">会員登録</a></li>
<li class="c-menu__item"><a class="c-menu__link" href="{{ route('login') }}">ログイン</a></li>
</ul>
<ul class="c-spMenu">
  <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.index') }}">案件を探す</a></li>
  <li class="c-menu__item"><a class="c-menu__link" href="{{ route('register') }}">会員登録</a></li>
  <li class="c-menu__item"><a class="c-menu__link" href="{{ route('login') }}">ログイン</a></li>
</ul>
@endguest

<!-- ログイン時 -->
@auth
<ul class="c-menu">
  <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.index') }}">案件を探す</a>
  </li>
  <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.bookmarks') }}">気になるリスト</a></li>
  <li class="c-menu__item"><a class="c-menu__link" href="{{route('users.mypage')}}">マイページ</a></li>
</ul>
<!-- スマホ向けメニュー -->
<ul class="c-spMenu">
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.mypage')}}">マイページ</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.new') }}">案件を登録する</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.registered') }}">登録した案件一覧</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.applied') }}">応募している案件一覧</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.closed') }}">成約済み案件一覧</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.bookmarks') }}">気になるリスト</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('comments.index') }}">コメントした案件一覧</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('messages.index') }}">ダイレクトメッセージ一覧</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.edit') }}">プロフィール編集</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.editPassword')}}">パスワード変更</a></li>
  <li class="c-spMenu__item"><a class="c-spMenu__link" href="">ヘルプ</a></li>
  <li class="c-menu__item c-menu__item--side">
    <a href="{{'logout'}}" class="c-menu__link c-menu__link--side" onclick="event.preventDefault();
            document.getElementById('logoutForm').submit();">ログアウト</a>
    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </li>
</ul>
@endauth
</nav>
</div>

<!-- ハンバーガーメニュー -->
<div class="c-menuTrigger js-header-trigger">
  <span class="c-menuTrigger__bar"></span>
  <span class="c-menuTrigger__bar"></span>
  <span class="c-menuTrigger__bar"></span>
</div>

</header> --}}
