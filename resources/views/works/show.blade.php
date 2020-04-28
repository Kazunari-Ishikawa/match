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
    <comments-list :work-id='@json($work->id)'></comments-list>

  </div>
</section>

@endsection
