@extends('layouts.app')

@section('content')
<search-work-list :category='@json($category)' :type='@json($type)'></search-work-list>

@endsection
