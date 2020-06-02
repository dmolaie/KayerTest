@include('fa.template.part-theme.head')
    <link rel="stylesheet" href="{{ asset('mapir/css/mapp.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mapir/css/fa/style.css') }}">
@extends('fa.template.master')
    @section('content')
        <div class="i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold sm:font-lg">
                    <span class="i-page__title text-center cursor-default">
                        نقشه
                    </span>
                </h1>
                <div class="inner-box inner-box--white p-0 overflow-hidden">
                    <div id="map"
                         class="p-map"
                    ></div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script type="text/javascript" src="{{ asset('js/site/runtime.js') }}" defer ></script>
        <script type="text/javascript" src="{{ asset('js/site/master.js') }}" defer ></script>
        <script type="text/javascript" src="{{ asset('mapir/js/jquery-3.2.1.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('mapir/js/mapp.env.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('mapir/js/mapp.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('js/site/map.js') }}" defer></script>
    @endsection