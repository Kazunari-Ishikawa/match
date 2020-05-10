@extends('layouts.app')

@section('content')
<section class="l-container">
  <!-- 案件編集 -->
  <div class="l-container__header">
    <h2 class="l-container__title">案件を編集する</h2>
  </div>

  <div class="l-container__body l-container__body--1column">

    <div class="c-flatBtn__container--right">
      <form action="{{ route('works.destroy', $work->id) }}" method="POST" class="c-form--btn">
        @csrf
        <input type="submit" id="deleteBtn" class="c-flatBtn" value="削除する">
      </form>
      <form action="{{ route('works.close', $work->id) }}" method="POST" class="c-form--btn">
        @csrf
        <input type="submit" id="closeBtn" class="c-flatBtn" value="完了する">
      </form>
    </div>

    <form method="POST" action="{{ route('works.update', $work->id) }}" class="c-form">
      @csrf

      <div class="c-form__group">
        <label for="title" class="c-form__label">タイトル</label>
        @error('title')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <input type="text" name="title" id="title" class="c-form__input @error('title') is-invalid @enderror" value="{{ old('title', $work->title) }}" placeholder="30文字以内で入力してください">
      </div>

      <div class="c-form__group">
        <p class="c-form__label">案件種別</p>
        @error('type')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <label for="type1" class="c-form__label--radio">
          <input type="radio" name="type" id="type1" class="c-form__radio" value="0" {{ old('type', $work->type) == 0 ? 'checked' : '' }}>単発
        </label>
        <label for="type2" class="c-form__label--radio">
          <input type="radio" name="type" id="type2" class="c-form__radio" value="1" {{ old('type', $work->type) == 1 ? 'checked' : '' }}>レベニューシェア
        </label>
      </div>

      <div class="c-form__group">
        <label for="category_id" class="c-form__label">カテゴリ</label>
        @error('category_id')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <select name="category_id" id="category_id" class="c-form__select">
          <option value="0">選択してください</option>
          <option value="1" {{old('category_id', $work->category_id) == 1 ? 'selected' : ''}}>ホームページ制作</option>
          <option value="2" {{old('category_id', $work->category_id) == 2 ? 'selected' : ''}}>WEBシステム開発</option>
          <option value="3" {{old('category_id', $work->category_id) == 3 ? 'selected' : ''}}>業務システム開発</option>
          <option value="4" {{old('category_id', $work->category_id) == 4 ? 'selected' : ''}}>アプリ開発</option>
          <option value="5" {{old('category_id', $work->category_id) == 5 ? 'selected' : ''}}>ECサイト構築</option>
          <option value="6" {{old('category_id', $work->category_id) == 6 ? 'selected' : ''}}>サーバー・クラウド</option>
          <option value="7" {{old('category_id', $work->category_id) == 7 ? 'selected' : ''}}>WEBマーケティング</option>
        </select>
      </div>

      <div class="c-form__group">
        <p for="price" class="c-form__label">金額（1,000円〜）</p>
        <span class="c-form__error">{{ $errors->first('min_price') }}</span>
        <span class="c-form__error">{{ $errors->first('max_price') }}</span>
        <div class="c-form__group--price">
          <input type="number" class="c-form__input c-form__input--price" name="min_price" id="lower" placeholder="1000" value="{{ old('min_price', $work->min_price) }}">
          <span class="c-form__price">〜</span>
          <input type="number" class="c-form__input c-form__input--price" name="max_price" id="upper" value="{{ old('max_price', $work->max_price) }}">
          <span class="c-form__price">円</span>
        </div>
      </div>

      <div class="c-form__group">
        <label for="content" class="c-form__label">内容</label>
        @error('content')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <textarea name="content" id="content" class="c-form__textarea">{{ old('content', $work->content) }}</textarea>
      </div>

      <div class="c-btn__container">
        <input type="submit" class="c-btn c-btn--em c-btn--full" value="編集する">
      </div>

    </form>
  </div>
</section>

@endsection
