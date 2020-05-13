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
    <!-- 未ログイン時 -->
    <!-- PC向けメニュー -->
    @guest
    <ul class="c-menu">
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('works.index') }}">案件を探す</a></li>
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('register') }}">会員登録</a></li>
      <li class="c-menu__item"><a class="c-menu__link" href="{{ route('login') }}">ログイン</a></li>
    </ul>
    <!-- スマホ向けメニュー -->
    <ul class="c-spMenu">
      <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.index') }}">案件を探す</a></li>
      <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('register') }}">会員登録</a></li>
      <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('login') }}">ログイン</a></li>
    </ul>
    @endguest

    <!-- ログイン時 -->
    <!-- PC向けメニュー -->
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
    <div class="c-spMenu__container">
      <ul class="c-spMenu--display">
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.mypage')}}">マイページ</a></li>
      </ul>
      <p class="c-spMenu__tab js-spMenu-tab">依頼者向け</p>
      <ul class="c-spMenu">
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.new') }}">依頼する</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.registered') }}">依頼した案件</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.closed') }}">成約済み案件</a></li>
      </ul>
      <p class="c-spMenu__tab js-spMenu-tab">応募者向け</p>
      <ul class="c-spMenu">
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.index') }}">案件を探す</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.applied') }}">応募中の案件</a></li>
      </ul>
      <p class="c-spMenu__tab js-spMenu-tab">共通</p>
      <ul class="c-spMenu">
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('works.bookmarks') }}">気になる案件</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('comments.index') }}">コメントした案件</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('messages.index') }}">メッセージ</a></li>
      </ul>
      <p class="c-spMenu__tab js-spMenu-tab">設定</p>
      <ul class="c-spMenu">
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.edit') }}">プロフィール編集</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="{{ route('users.editPassword')}}">パスワード変更</a></li>
        <li class="c-spMenu__item"><a class="c-spMenu__link" href="">ヘルプ</a></li>
        <li class="c-spMenu__item">
          <a href="{{'logout'}}" class="c-spMenu__link" onclick="event.preventDefault();
            document.getElementById('logoutForm').submit();">ログアウト</a>
          <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>

    @endauth
  </nav>

</header>
