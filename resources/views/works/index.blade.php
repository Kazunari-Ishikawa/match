@extends('layouts.app')

@section('description')
<meta name="description" content="matchworksの案件一覧ページです。短期間の仕事から、レベニューシェア型の案件まで幅広く依頼があります。">
@endsection

@section('keywords')
<meta name="keywords" content="ビジネスマッチング, 単発案件, レベニューシェア">
@endsection

@section('title')
<title>案件一覧 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body--1column">

    <search-work-list :category='@json($category)' :type='@json($type)'></search-work-list>

  </section>

</div>

@endsection
