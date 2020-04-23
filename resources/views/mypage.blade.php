@extends('layouts.app')

@section('content')

<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  <section class="l-sideBar">
    <ul class="c-menu--side">
      <li class="c-menu__item c-menu__item--side"><a href="create.html" class="c-menu__link c-menu__link--side">案件を登録する</a></li>
      <li class="c-menu__item c-menu__item--side"><a href="registeredProjects.html" class="c-menu__link c-menu__link--side">登録した案件一覧</a></li>
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
      <li class="c-menu__item c-menu__item--side"><a href="editProfile.html" class="c-menu__link c-menu__link--side">プロフィール編集</a></li>
      <li class="c-menu__item c-menu__item--side"><a href="editPassword.html" class="c-menu__link c-menu__link--side">パスワード変更</a></li>
      <li class="c-menu__item c-menu__item--side"><a href="help.html" class="c-menu__link c-menu__link--side">ヘルプ</a></li>
      <li class="c-menu__item c-menu__item--side"><a href="withdraw.html" class="c-menu__link c-menu__link--side">ログアウト</a></li>
    </ul>
  </section>

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <!-- プロフィール -->
    <div class="p-profile">
      <div class="p-profile__icon">
      </div>
      <p class="p-profile__name">Username</p>
    </div>

    <!-- タブ -->
    <ul class="c-projectTab">
      <li class="c-projectTab__item active">登録した案件</li>
      <li class="c-projectTab__item">応募した案件</li>
      <li class="c-projectTab__item">成約済み案件</li>
      <li class="c-projectTab__item">気になるリスト</li>
    </ul>

    <!-- 案件リスト -->
    <div class="c-projectList">
      <div class="c-project">
        <div class="c-project__header">
          <h3 class="c-project__title">タイトルタイトルタイトルタイトルタイトル</h3>
          <p class="c-project__date">登録日:2020/4/16</p>
        </div>
        <div class="c-project__body">
          <div class="c-project__info">
            <p class="c-project__type">単発案件</p>
            <p class="c-project__category">ホームページ制作</p>
            <p class="c-project__price">
              <span class="c-project__price--lower">10,000</span> ~
              <span class="c-project__price--upper">50,000</span>円
            </p>
          </div>
          <p class="c-project__detail">
            ああああああああああああデフォつろファフェアフェアフェアfあああああああああああああああああああああああテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストああああああああああああデフォつろファフェアフェアフェアfあああああああああああああああああああああああテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </p>
        </div>
      </div>
      <a href="" class="c-project">
        <div class="c-project__header">
          <h3 class="c-project__title">タイトルタイトルタイトルタイトルタイトル</h3>
          <p class="c-project__date">登録日:2020/4/16</p>
        </div>
        <div class="c-project__body">
          <div class="c-project__info">
            <p class="c-project__type">単発案件</p>
            <p class="c-project__category">ホームページ制作</p>
            <p class="c-project__price">
              <span class="c-project__price--lower">10,000</span> ~
              <span class="c-project__price--upper">50,000</span>円
            </p>
          </div>
          <p class="c-project__detail">
            ああああああああああああデフォつろファフェアフェアフェアfあああああああああああああああああああああああテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストああああああああああああデフォつろファフェアフェアフェアfあああああああああああああああああああああああテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </p>
        </div>
      </a>
      <a href="" class="c-project">
        <div class="c-project__header">
          <h3 class="c-project__title">タイトルタイトルタイトルタイトルタイトル</h3>
          <p class="c-project__date">登録日:2020/4/16</p>
        </div>
        <div class="c-project__body">
          <div class="c-project__info">
            <p class="c-project__type">レベニューシェア案件</p>
            <p class="c-project__category">ホームページ制作</p>
          </div>
          <p class="c-project__detail">
            ああああああああああああデフォつろファフェアフェアフェアfあああああああああああああああああああああああテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストああああああああああああデフォつろファフェアフェアフェアfあああああああああああああああああああああああテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </p>
        </div>
      </a>
    </div>

  </section>

</div>

@endsection
