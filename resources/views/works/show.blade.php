@extends('layouts.app')

@section('content')
<section class="l-container">

  <div class="l-container__body l-container__body--1column">
    <!-- 案件詳細 -->
    <div class="p-projectDetail">
      <h2 class="p-projectDetail__title">{{ $work->title }}</h2>
      <div class="p-projectDetail__meta">
        <div class="p-projectDetail__name">{{ $work->user->name}}</div>
        <div class="p-projectDetail__date">登録日:{{ $work->created_at }}</div>
      </div>

      <div class="p-projectDetail__body">
        <table class="p-projectDetail__table">
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">カテゴリ</th>
            <td class="p-projectDetail__data">{{ $work->category->name }}</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">案件種別</th>
            <td class="p-projectDetail__data">{{ $work->type }}</td>
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">金額</th>
            @if($work->type == 'レベニューシェア')
            <td class="p-projectDetail__data">依頼者との相談</td>
            @else
            <td class="p-projectDetail__data">{{ $work->min_price }}〜{{ $work->max_price }}円</td>
            @endif
          </tr>
          <tr class="p-projectDetail__row">
            <th class="p-projectDetail__head">応募者数</th>
            <td class="p-projectDetail__data">{{ $count }}人が応募しています</td>
          </tr>
        </table>

        <div class="p-projectDetail__action">
          <div class="p-projectDetail__tag--container">
            <div class="p-projectDetail__tag p-projectDetail__tag--like">気になる!</div>
            <div class="p-projectDetail__tag p-projectDetail__tag--twitter">シェア!</div>
          </div>

          <div class="c-btn__container">
            @if ($is_registered)
            <a href="{{ route('works.edit', $work->id) }}" class="c-btn">編集する</a>
            @elseif($is_applied)
            <form action="{{ route('works.cancel', $work->id) }}" method="POST">
              @csrf
              <input type="submit" class="c-btn c-btn--em" value="応募を取り消す">
            </form>
            @else
            <form action="{{ route('works.apply', $work->id) }}" method="POST">
              @csrf
              <input type="submit" class="c-btn c-btn--em" value="応募する">
            </form>
            @endif
          </div>

        </div>

      </div>
      <p class="p-projectDetail__content">{{ $work->content }}</p>
    </div>

    <!-- コメント一覧 -->
    <comments-list :work-id='@json($work->id)'></comments-list>

    <!-- コメント入力フォーム -->
    <form action="{{ route('comments.new', $work->id) }}" method="POST" class="c-form">
      @csrf
      <div class="c-form__group">
        <textarea name="content" class="c-form__textarea c-form__textarea--message"></textarea>
      </div>
      <div class="c-btn__container">
        <input type="submit" class="c-btn c-btn--em" value="コメントする" />
      </div>
    </form>

  </div>
</section>

@endsection
