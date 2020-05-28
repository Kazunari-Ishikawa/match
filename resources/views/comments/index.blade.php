@extends('layouts.app')

@section('description')
<meta name="description" content="コメントした案件一覧ページです。">
@endsection

@section('keywords')
<meta name="keywords" content="コメント, 案件一覧">
@endsection

@section('title')
<title>コメントした案件 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">

    <work-list :with-comment="true" :list-title='@json("コメントした案件")'></work-list>

  </section>

</div>

@endsection
