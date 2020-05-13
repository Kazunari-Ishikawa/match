@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <work-list :list-title='@json("気になる案件")'></work-list>

</div>

@endsection
