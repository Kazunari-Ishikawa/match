@extends('layouts.app')

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <p class="c-form__text"><a href="{{ url()->previous('/') }}">前ページへ戻る</a></p>

    <!-- 案件詳細 -->
    {{-- <work-detail :work='@json($work)'></work-detail> --}}
    <div class="p-workDetail">
      <h2 class="p-workDetail__title">{{ $work->title }}</h2>
      <div class="p-workDetail__body">
        <table class="p-workDetail__table">
          <tr class="p-workDetail__row">
          <tr class="p-workDetail__row">
            <th class="p-workDetail__head">登録日</th>
            <td class="p-workDetail__data">{{ $work->created_at }}</td>
          </tr>
          <th class="p-workDetail__head">依頼者</th>
          <td class="p-workDetail__data"><a href="{{ route('users.show', $work->user->id) }}">{{ $work->user->name}}</a></td>
          </tr>
          <tr class="p-workDetail__row">
            <th class="p-workDetail__head">カテゴリ</th>
            <td class="p-workDetail__data">{{ $work->category->name }}</td>
          </tr>
          <tr class="p-workDetail__row">
            <th class="p-workDetail__head">案件種別</th>
            <td class="p-workDetail__data">{{ $work->type }}</td>
          </tr>
          <tr class="p-workDetail__row">
            <th class="p-workDetail__head">金額</th>
            @if($work->type == 'レベニューシェア')
            <td class="p-workDetail__data">依頼者との相談</td>
            @else
            <td class="p-workDetail__data">{{ $work->min_price }}〜{{ $work->max_price }}円</td>
            @endif
          </tr>
          <tr class="p-workDetail__row">
            <th class="p-workDetail__head">応募者数</th>
            <td class="p-workDetail__data">{{ $count }}人が応募しています</td>
          </tr>
        </table>

        <div class="p-workDetail__action">
          <div class="c-btn__container">
            <div class="c-btn c-btn--reverse c-btn--sm"><i class="far fa-bookmark"></i>気になる</div>
          </div>
          <div class="c-btn__container">
            <div class="c-btn c-btn--sm c-btn--reverse c-btn--twitter"><i class="fab fa-twitter"></i>でシェア</div>
          </div>
        </div>
      </div>

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

      <p class="p-workDetail__content">{{ $work->content }}</p>
    </div>

    <!-- コメント一覧 -->
    <comment-list :work-id='@json($work->id)'></comment-list>

    <!-- コメント入力フォーム -->
    <form action="{{ route('comments.new', $work->id) }}" method="POST" class="c-form">
      @csrf
      <div class="c-form__group">
        <textarea name="content" class="c-form__textarea c-form__textarea--message"></textarea>
      </div>
      {{-- <div class="c-btn__container"> --}}
      <input type="submit" class="c-btn c-btn--em c-btn--full" value="コメントする" />
      {{-- </div> --}}
    </form>

  </div>
</section>

@endsection
