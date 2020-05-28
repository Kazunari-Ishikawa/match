@extends('layouts.app')

@section('description')
<meta name="description" content="依頼した案件一覧ページです。">
@endsection

@section('keywords')
<meta name="keywords" content="依頼, 案件一覧">
@endsection

@section('title')
<title>依頼した案件 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">

    <work-list :list-title='@json("依頼した案件")'></work-list>

  </section>

</div>

@endsection
