@extends('layouts.app')

@section('content')

<div class="l-container">

  <!-- メインコンテンツ -->
  <section class="l-container__body--1column">

    <search-work-list :category='@json($category)' :type='@json($type)'></search-work-list>

  </section>

</div>

@endsection
