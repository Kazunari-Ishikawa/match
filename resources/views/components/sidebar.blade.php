<section class="l-sidebar">
  <ul class="c-menu--side">
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.new') }}" class="c-menu__link c-menu__link--side">案件を登録する</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.registered') }}" class="c-menu__link c-menu__link--side">登録した案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.applied') }}" class="c-menu__link c-menu__link--side">応募している案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('comments.index')}}" class="c-menu__link c-menu__link--side">コメントした案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.closed') }}" class="c-menu__link c-menu__link--side">成約済み案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.bookmarks') }}" class="c-menu__link c-menu__link--side">気になるリスト</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('messages.index') }}" class="c-menu__link c-menu__link--side">ダイレクトメッセージ一覧</a></li>
  </ul>
  <ul class="c-menu--side">
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('users.edit')}}" class="c-menu__link c-menu__link--side">プロフィール編集</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('users.editPassword')}}" class="c-menu__link c-menu__link--side">パスワード変更</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="help.html" class="c-menu__link c-menu__link--side">ヘルプ</a></li>
    <li class="c-menu__item c-menu__item--side">
      <a href="{{'logout'}}" class="c-menu__link c-menu__link--side" onclick="event.preventDefault();
        document.getElementById('logoutSideForm').submit();">ログアウト</a>
      <form id="logoutSideForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</section>
