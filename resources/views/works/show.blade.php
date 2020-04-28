@extends('layouts.app')

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <!-- 案件詳細 -->
    <div class="p-projectDetail">
      <h2 class="p-projectDetail__title">{{ $work->title }}</h2>
      <div class="p-projectDetail__meta">
        <div class="p-projectDetail__name">Username</div>
        <div class="p-projectDetail__date">登録日:2020/4/25</div>
      </div>
      <div class="p-projectDetail__body">
        <table class="p-projectDetail__table">
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">カテゴリ</th>
            <td class="p-projectDetail__data">ホームページ制作</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">案件種別</th>
            <td class="p-projectDetail__data">レベニューシェア</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">金額</th>
            <td class="p-projectDetail__data">依頼者との相談</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">応募者数</th>
            <td class="p-projectDetail__data">3人が応募しています</td>
          </tr>
        </table>
        <div class="p-projectDetail__action">
          <div class="p-projectDetail__tag--container">
            <div class="p-projectDetail__tag p-projectDetail__tag--like">気になる!</div>
            <div class="p-projectDetail__tag p-projectDetail__tag--twitter">シェア!</div>
          </div>
          <div class="c-btn__container">
            <div class="c-btn c-btn--em">応募する</div>
          </div>
        </div>
      </div>
      <p class="p-projectDetail__content">{{ $work->content }}</p>
    </div>

    <!-- コメント一覧 -->
    <div class="c-comment__list">
      <div class="c-comment">
        <div class="c-comment__account">
          <img src="" alt="" class="c-comment__icon">
          <div class="c-comment__accountName">
            <p class="c-comment__name">Username</p>
            <div class="c-comment__tag">依頼者</div>
          </div>
        </div>
        <div class="c-comment__body">
          <p class="c-comment__content">コメントコメントコメントコメントコメントコメントコメントコメント</p>
          <p class="c-comment__date">2020/4/22 19:14</p>
        </div>
      </div>
      <div class="c-comment">
        <div class="c-comment__user">
          <img src="" alt="" class="c-comment__icon">
          <p class="c-comment__name">Username</p>
          <div class="c-comment__tag">依頼者</div>
        </div>
        <div class="c-comment__body">
          <p class="c-comment__content">コメントコメントコメントコメントコメントコメントコメントコメント</p>
          <p class="c-comment__date">2020/4/22 19:14</p>
        </div>
      </div>
      <div class="c-comment">
        <div class="c-comment__user">
          <img src="" alt="" class="c-comment__icon">
          <p class="c-comment__name">Username</p>
          <div class="c-comment__tag">依頼者</div>
        </div>
        <div class="c-comment__body">
          <p class="c-comment__content">コメントコメントコメントコメントコメントコメントコメントコメント</p>
          <p class="c-comment__date">2020/4/22 19:14</p>
        </div>
      </div>

      <!-- コメント入力フォーム -->
      <form action="" class="c-form--comment">
        <div class="c-form__group">
          <textarea class="c-form__textarea"></textarea>
        </div>
        <div class="c-btn__container">
          <input class="c-btn c-btn--em" value="コメントする">
        </div>
      </form>

    </div>

  </div>
</section>

@endsection
