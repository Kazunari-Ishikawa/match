<section class="l-sidebar">
  <ul class="c-menu--side">
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.new') }}" class="c-menu__link c-menu__link--side">案件を登録する</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="{{ route('works.registered') }}" class="c-menu__link c-menu__link--side">登録した案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="appliedProjects.html" class="c-menu__link c-menu__link--side">応募した案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="closedProjects.html" class="c-menu__link c-menu__link--side">成約済み案件一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="likeProjects.html" class="c-menu__link c-menu__link--side">気になるリスト</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="history.html" class="c-menu__link c-menu__link--side">閲覧履歴</a></li>
  </ul>
  <ul class="c-menu--side">
    <li class="c-menu__item c-menu__item--side"><a href="comments.html" class="c-menu__link c-menu__link--side">投稿したコメント一覧</a></li>
    <li class="c-menu__item c-menu__item--side"><a href="messages.html" class="c-menu__link c-menu__link--side">ダイレクトメッセージ一覧</a></li>
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
