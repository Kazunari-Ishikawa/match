@extends('layouts.app')

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <!-- 案件詳細 -->
    <div class="p-projectDetail">
      <div class="p-projectDetail__badge">単発案件</div>
      <h2 class="p-projectDetail__title">タイトルタイトルタイトルタイトルタイトルタイトル</h2>
      <div class="p-projectDetail__body">
        <table class="p-projectDetail__table">
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">登録日</th>
            <td class="p-projectDetail__data">2020年4月16日</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">カテゴリ</th>
            <td class="p-projectDetail__data">ホームページ制作</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">依頼者</th>
            <td class="p-projectDetail__data">Username</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">金額</th>
            <td class="p-projectDetail__data">10,000 〜 50,000 円</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">応募者数</th>
            <td class="p-projectDetail__data">3人が応募しています</td>
          </tr>
        </table>
        <p class="p-projectDetail__detail">
          わあわわわあわわテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
        <div class="c-btn__container">
          <div class="c-btn c-btn--em">応募する</div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
