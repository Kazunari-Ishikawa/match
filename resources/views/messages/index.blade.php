@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <div class="c-workList__header">
      <h2 class="c-workList__title">メッセージ</h2>
      <p class="c-workList__info">20件中 <span>1</span> - <span>10</span>件表示</p>
    </div>

    <div class="c-messageBoard__list">
      <a href="messageDetail.html" class="c-messageBoard">
        <img src="" alt="アイコン" class="c-messageBoard__icon">
        <div class="c-messageBoard__body">
          <p class="c-messageBoard__name">Username<span>さん</span></p>
          <p class="c-messageBoard__content">コメントコメントコメントコメントコメント</p>
        </div>
        <p class="c-messageBoard__date">4/22 19:14</p>
      </a>

      <div class="c-messageBoard">
        <img src="" alt="アイコン" class="c-messageBoard__icon">
        <div class="c-messageBoard__body">
          <p class="c-messageBoard__name">Username<span>さん</span></p>
          <p class="c-messageBoard__content">コメントコメントコメントコメントコメント</p>
        </div>
        <p class="c-messageBoard__date">4/22 19:14</p>
      </div>

  </section>
</div>

@endsection
