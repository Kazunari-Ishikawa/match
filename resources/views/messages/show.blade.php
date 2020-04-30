@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">

    <div class="p-messageDetail">
      <div class="p-messageDetail__header">
        <h2 class="p-messageDetail__title">かず<span>さん</span></h2>
      </div>

      <div class="p-messageDetail__body">
        <div class="c-message c-message--other">
          <p class="c-message__content c-message__content--other">メッセージメッセージメッセージメッセージメッセージメッセージ</p>
          <p class="c-message__date c-message__date--other">4/25 12:15</p>
        </div>
        <div class="c-message c-message--myself">
          <p class="c-message__content c-message__content--myself">メッセージコメントテストです</p>
          <p class="c-message__date c-message__date--myself">4/25 18:09</p>
        </div>
        <div class="c-message c-message--other">
          <p class="c-message__content c-message__content--other">メッセージメッセージメッセージメッセージメッセージメッセージ</p>
          <p class="c-message__date c-message__date--other">4/25 12:15</p>
        </div>
        <div class="c-message c-message--myself">
          <p class="c-message__content c-message__content--myself">メッセージコメントテストです</p>
          <p class="c-message__date c-message__date--myself">4/25 18:09</p>
        </div>
        <div class="c-message c-message--other">
          <p class="c-message__content c-message__content--other">メッセージメッセージメッセージメッセージメッセージメッセージ</p>
          <p class="c-message__date c-message__date--other">4/25 12:15</p>
        </div>
        <div class="c-message c-message--myself">
          <p class="c-message__content c-message__content--myself">メッセージコメントテストです</p>
          <p class="c-message__date c-message__date--myself">4/25 18:09</p>
        </div>
        <div class="c-message c-message--other">
          <p class="c-message__content c-message__content--other">メッセージメッセージメッセージメッセージメッセージメッセージ</p>
          <p class="c-message__date c-message__date--other">4/25 12:15</p>
        </div>
        <div class="c-message c-message--myself">
          <p class="c-message__content c-message__content--myself">メッセージコメントテストです</p>
          <p class="c-message__date c-message__date--myself">4/25 18:09</p>
        </div>
      </div>

      <div class="p-messageDetail__post">
        <form action="" class="c-form--message">
          <div class="c-form__group--sm">
            <textarea class="c-form__textarea c-form__textarea--message"></textarea>
          </div>
          <div class="c-btn__container">
            <input type="submit" class="c-btn c-btn--em" value="送信する">
          </div>
        </form>
      </div>
    </div>

  </section>
</div>

@endsection
