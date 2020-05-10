@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">
    <div class="c-workList__header">
      <h2 class="c-workList__title">応募している案件</h2>
      <p class="c-workList__info">件中 <span>1</span> - <span>10</span>件表示</p>
    </div>

    <works-list :is-applied="true"></works-list>

  </section>

</div>

@endsection
