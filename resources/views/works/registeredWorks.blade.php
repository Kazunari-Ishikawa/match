@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <works-list :list-title='@json("依頼した案件")'></works-list>

</div>

@endsection
