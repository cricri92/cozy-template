@extends('properties.properties')
<!-- BEGIN CONTENT 1 WRAPPER -->
@section('inner-content')
    @component('template.components.breadcrumb-component')
        <ul class="breadcrumb">
            @slot('title')
                Detalle de la propiedad
            @endslot
            <li><a href="index.html">Inicio</a></li>
            <li><a href="#">Propiedades</a></li>
            <li><a href="{{ route('properties-list') }}">Listado de Inmuebles</a></li>
            <li><a href="{{ route('properties-list') }}">Detalle del Inmueble {{--aqui va el id :D--}}</a></li>
        </ul>
    @endcomponent
    <div class="content gray">
        <div class="container">
            <div class="row">
                <!-- BEGIN MAIN CONTENT 1 -->
                <div class="main col-sm-8">
                    @include('properties.property-detail.property-gallery')
                    @include('properties.property-detail.property-features')
                    @include('properties.property-detail.property-location')
                    @include('properties.property-detail.agent-contact')
                    @include('properties.property-detail.similar-properties')
                </div>
                <!-- BEGIN SIDEBAR 1 -->
                <div class="sidebar gray col-sm-4">
                    @include('properties.properties-sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- END CONTENT WRAPPER -->

