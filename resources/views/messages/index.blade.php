@extends('layouts.app')

@section('description')
<meta name="description" content="メッセージの一覧です。依頼に応募があった場合と、案件に応募した場合にメッセージでやり取りできます。">
@endsection

@section('keywords')
<meta name="keywords" content="メッセージ">
@endsection

@section('title')
<title>メッセージ一覧 - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">

    <board-list></board-list>

  </section>
</div>

@endsection
