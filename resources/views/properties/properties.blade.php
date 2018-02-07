@extends('template.layout')

@section('content')
    @component('template.components.breadcrumb-component')
        <ul class="breadcrumb">
            @slot('title')
                Property Listing
            @endslot
            <li><a href="index.html">Home </a></li>
            <li><a href="#">Properties</a></li>
            <li><a href="properties-list.html">Property Listing</a></li>
        </ul>
    @endcomponent
    @include('properties.properties-content')
@endsection
