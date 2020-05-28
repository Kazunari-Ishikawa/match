@extends('layouts.app')

@section('description')
<meta name="description" content="{{ $work->title }}の編集をします。">
@endsection

@section('keywords')
<meta name="keywords" content="編集, 案件種別, カテゴリ">
@endsection

@section('title')
<title>案件を編集する - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<section class="l-container">
  <!-- 案件編集 -->
  <div class="l-container__header">
    <h2 class="l-container__title">案件を編集する</h2>
  </div>

  <div class="l-container__body l-container__body--1column">
    <p class="c-form__link"><a href="{{ url()->previous('/') }}">前ページへ戻る</a></p>

    <div class="c-btn__container--right">
      <form action="{{ route('works.destroy', $work->id) }}" method="POST" class="u-mr20">
        @csrf
        <input type="submit" class="c-flatBtn js-delete-work" value="削除する">
      </form>
      <form action="{{ route('works.close', $work->id) }}" method="POST" class="">
        @csrf
        <input type="submit" class="c-flatBtn js-close-work" value="完了する">
      </form>
    </div>

    <form method="POST" action="{{ route('works.update', $work->id) }}" class="c-form">
      @csrf

      <div class="c-form__group">
        <label for="title" class="c-form__label">タイトル</label>
        @error('title')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <input type="text" name="title" id="title" class="c-form__input @error('title') isInvalid @enderror" value="{{ old('title', $work->title) }}" placeholder="30文字以内で入力してください">
      </div>

      <div class="c-form__group">
        <p class="c-form__label">案件種別</p>
        @error('type')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <label for="type1" class="c-form__label--radio">
          <input type="radio" name="type" id="type1" class="c-form__radio" value="1" {{ old('type', $work->type) == '単発案件' ? 'checked' : '' }}>単発案件
        </label>
        <label for="type2" class="c-form__label--radio">
          <input type="radio" name="type" id="type2" class="c-form__radio" value="2" {{ old('type', $work->type) == 'レベニューシェア' ? 'checked' : '' }}>レベニューシェア
        </label>
      </div>

      <div class="c-form__group">
        <label for="category_id" class="c-form__label">カテゴリ</label>
        @error('category_id')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
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
        <p class="c-form__text">※レベニューシェアの場合相談により配分率を決めていだたくだめ、入力は不要です。</p>
        <span class="c-form__text c-form__text--error">{{ $errors->first('min_price') }}</span>
        <span class="c-form__text c-form__text--error">{{ $errors->first('max_price') }}</span>
        <div class="c-form__group--price">
          <input type="number" class="c-form__input c-form__input--price @error('min_price') isInvalid @enderror" name="min_price" id="lower" placeholder="1" value="{{ old('min_price', $work->min_price/1000) }}">
          <span class="c-form__price">,000〜</span>
          <input type="number" class="c-form__input c-form__input--price @error('max_price') isInvalid @enderror" name="max_price" id="upper" value="{{ old('max_price', $work->max_price/1000) }}">
          <span class="c-form__price">,000円</span>
        </div>
      </div>

      <div class="c-form__group">
        <label for="content" class="c-form__label">内容</label>
        @error('content')
        <span class="c-form__text c-form__text--error">{{ $message }}</span>
        @enderror
        <p class="c-form__sample">内容には下記の項目を含めて、案件を分かりやすく説明しましょう。<br>・サービス、案件のコンセプト<br>・期限（単発案件なら納期、レベニューシェアなら期間）<br>・デザイン素材（写真やイラストなど）の準備はどちらが行うか</p>
        <textarea name="content" id="content" class="c-form__textarea @error('content') isInvalid @enderror">{{ old('content', $work->content) }}</textarea>
      </div>

      <input type="submit" class="c-btn c-btn--em c-btn--full" value="編集する">
    </form>

  </div>
</section>

@endsection
