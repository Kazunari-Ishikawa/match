@extends('layouts.app')

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <p class="c-form__link"><a href="{{ route('works.index') }}">案件一覧へ戻る</a></p>

    <!-- 案件詳細 -->
    <work-detail :data='@json($work)'></work-detail>

    <!-- 応募ボタン -->
    <div class="p-workDetail__apply">
      @if ($is_registered)
      <a href="{{ route('works.edit', $work->id) }}" class="c-btn c-btn--full">編集する</a>
      @elseif($is_applied)
      <form action="{{ route('works.cancel', $work->id) }}" method="POST">
        @csrf
        <input type="submit" class="c-btn c-btn--em c-btn--full" id="js-cancel-apply" value="応募を取り消す">
      </form>
      @else
      <form action="{{ route('works.apply', $work->id) }}" method="POST">
        @csrf
        <input type="submit" class="c-btn c-btn--em c-btn--full" value="応募する">
      </form>
      @endif
    </div>

    <!-- コメント一覧 -->
    <comment-list :work-id='@json($work->id)'></comment-list>

    <!-- コメント入力フォーム -->
    <form action="{{ route('comments.create', $work->id) }}" method="POST" class="c-form">
      @csrf
      <div class="c-form__group">
        @error('content')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <textarea name="content" class="c-form__textarea c-form__textarea--message">{{ old('content') }}</textarea>
        <p class="c-form__text u-mb0">※最大100文字</p>
      </div>
      <input type="submit" class="c-btn c-btn--em c-btn--full" value="コメントする" />
    </form>

  </div>
</section>

@endsection
