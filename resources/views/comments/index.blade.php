@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <work-list :with-comment="true" :list-title='@json("コメントした案件")'></work-list>

</div>

@endsection
