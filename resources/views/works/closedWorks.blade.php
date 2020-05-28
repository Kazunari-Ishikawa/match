@extends('layouts.app')

@section('description')
<meta name="description" content="成約済み案件一覧ページです。">
@endsection

@section('keywords')
<meta name="keywords" content="成約, 案件一覧">
@endsection

@section('title')
<title>成約済み案件 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">

    <work-list :list-title='@json("成約済み案件")'></work-list>

  </section>

</div>

@endsection
