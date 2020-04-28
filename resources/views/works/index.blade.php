@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  <section class="l-sidebar">
    <form action="" class="c-form--side">
      <div class="c-form__group">
        <p class="c-form__label">案件種別</p>
        <label for="type1" class="c-form__label--radio">
          <input type="radio" name="type" id="type1" value="1" class="c-form__radio">単発
        </label>
        <label for="type2" class="c-form__label--radio">
          <input type="radio" name="type" id="type2" value="2" class="c-form__radio">レベニューシェア
        </label>
      </div>
      <div class="c-form__group">
        <label for="category" class="c-form__label">カテゴリ</label>
        <select name="category" id="category" class="c-form__select">
          <option value="0">指定しない</option>
          <option value="1">ホームページ制作</option>
          <option value="2">WEBシステム開発</option>
          <option value="3">業務システム開発</option>
          <option value="4">アプリ開発</option>
          <option value="5">ECサイト構築</option>
          <option value="6">サーバー・クラウド</option>
          <option value="7">WEBマーケティング</option>
        </select>
      </div>
      <div class="c-form__group">
        <p class="c-form__label">金額</p>
        <select name="lower" id="lower" class="c-form__select c-form__select--price">
          <option value="0">指定しない</option>
          <option value="1">1,000</option>
          <option value="2">3,000</option>
          <option value="3">5,000</option>
          <option value="4">10,000</option>
          <option value="5">50,000</option>
          <option value="6">100,000</option>
          <option value="7">500,000</option>
          <option value="8">1,000,000</option>
        </select>
        <p class="c-form__label--back">円以上〜</p>
        <select name="upper" id="uppper" class="c-form__select c-form__select--price">
          <option value="0">指定しない</option>
          <option value="1">1,000</option>
          <option value="2">3,000</option>
          <option value="3">5,000</option>
          <option value="4">10,000</option>
          <option value="5">50,000</option>
          <option value="6">100,000</option>
          <option value="7">500,000</option>
          <option value="8">1,000,000</option>
        </select>
        <p class="c-form__label--back">円以下</p>
      </div>
      <input type="submit" class="c-btn c-btn--full" value="絞り込み">
    </form>
  </section>

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <div class="c-workList__header">
      <h2 class="c-workList__title">案件一覧</h2>
      <p class="c-workList__info">20件中 <span>1</span> - <span>10</span>件表示</p>
    </div>

    <works-list></works-list>

  </section>

</div>

@endsection
