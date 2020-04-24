@extends('layouts.app')

@section('content')

<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <h2 class="c-mypage__title">プロフィール編集</h2>

    <div class="c-mypage__contents">
      <form action="{{ route('users.edit') }}" method="POST" class="c-form">
        @csrf

        <div class="c-form__group">
          @error('name')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <input type="text" class="c-form__input" name="name" id="name" placeholder="ユーザー名">
        </div>

        <div class="c-form__group">
          @error('email')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <input type="email" class="c-form__input" name="email" id="email" placeholder="メールアドレス">
        </div>

        <div class="c-form__group">
          @error('icon')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <label class="c-form__group--drop">
            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
            <input type="file" class="c-form__file" name="icon" id="icon" accept="image/*" />
            ドラッグ＆ドロップ
          </label>
        </div>

        <div class="c-form__group">
          @error('profile')
          <span class="c-form__error">{{ $message }}</span>
          @enderror
          <textarea name="profile" id="profile" class="c-form__textarea"></textarea>
        </div>

        <div class="c-form__group">
          <input type="submit" class="c-btn c-btn--full" value="編集する">
        </div>

        <p class="c-form__link">
          <a href="">matchを退会する</a>
        </p>

      </form>
    </div>
  </section>
</div>

@endsection
