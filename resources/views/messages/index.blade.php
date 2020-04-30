@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <div class="c-workList__header">
      <h2 class="c-workList__title">メッセージ</h2>
      <p class="c-workList__info">20件中 <span>1</span> - <span>10</span>件表示</p>
    </div>

    <boards-list></boards-list>

  </section>
</div>

@endsection
