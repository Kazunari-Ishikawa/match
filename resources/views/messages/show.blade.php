@extends('layouts.app')

@section('content')
<div class="l-container l-container--withSide">

  <!-- サイドバー -->
  @include('components.sidebar')

  <!-- メインコンテンツ -->
  <section class="l-container__body--withSide">

    <message-list :board-id='@json($board->id)' :request-user-id='@json($request_user_id)' :send-user-name='@json($send_user_name)'></message-list>

  </section>
</div>

@endsection
