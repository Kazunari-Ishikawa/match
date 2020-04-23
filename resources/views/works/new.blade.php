@extends('layouts.app')

@section('content')
<section class="l-container">
  <!-- 案件登録 -->
  <div class="l-container__header">
    <h2 class="l-container__title">案件登録</h2>
  </div>

  <div class="l-container__body l-container__body--1column">
    <form method="POST" action="{{ route('works.new') }}" class="c-form">
      @csrf
      <div class="c-form__group">
        <label for="title" class="c-form__label">タイトル</label>
        @error('title')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <input type="text" name="title" id="title" class="c-form__input @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="30文字以内で入力してください">
      </div>

      <div class="c-form__group">
        <p class="c-form__label">案件種別</p>
        @error('type')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <label for="type1" class="c-form__label--radio">
          <input type="radio" name="type" id="type1" class="c-form__radio" value="0" {{ old('type') == 0 ? 'checked' : '' }}>単発
        </label>
        <label for="type2" class="c-form__label--radio">
          <input type="radio" name="type" id="type2" class="c-form__radio" value="1" {{ old('type') == 1 ? 'checked' : '' }}>レベニューシェア
        </label>
      </div>

      <div class="c-form__group">
        <label for="category" class="c-form__label">カテゴリ</label>
        @error('category')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <select name="category" id="category" class="c-form__select">
          <option value="0">選択してください</option>
          <option value="1">ホームページ制作</option>
          <option value="2">WEBシステム開発</option>
          <option value="3">業務システム開発</option>
          <option value="4">アプリ開発</option>
          <option value="5">ECサイト構築</option>
          <option value="6">サーバー・クラウド</option>
          <option value="7">WEBマーケティング</option>
          <option value="8">その他</option>
        </select>
      </div>

      <div class="c-form__group">
        <p for="price" class="c-form__label">金額（1,000円〜）</p>

        <span class="c-form__error">{{ $errors->first('min_price') }}</span>
        <span class="c-form__error">{{ $errors->first('max_price') }}</span>

        <div class="c-form__group--price">
          <input type="number" class="c-form__input c-form__input--price" name="min_price" id="lower" placeholder="1000" value="{{ old('min_price') }}">
          <span class="c-form__price">〜</span>
          <input type="number" class="c-form__input c-form__input--price" name="max_price" id="upper" value="{{ old('max_price') }}">
          <span class="c-form__price">円</span>
        </div>
      </div>

      <div class="c-form__group">
        <label for="content" class="c-form__label">内容</label>
        @error('content')
        <span class="c-form__error">{{ $message }}</span>
        @enderror
        <textarea name="content" id="content" class="c-form__textarea"></textarea>
      </div>

      <div class="c-btn__container">
        <input type="submit" class="c-btn c-btn--em c-btn--full" value="登録する">
      </div>

    </form>
  </div>
  </div>
</section>

@endsection
