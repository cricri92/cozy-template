@extends('template.layout')

@section('content')
    @include('home.map-filter')
    @include('home.action-box')
    @include('home.latest-properties')
    @include('home.properties-counter')
    @include('home.properties-gallery')
    @include('home.latest-tweets')
@endsection