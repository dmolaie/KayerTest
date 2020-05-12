@include('fa.template.part-theme.head')
    <link rel="stylesheet" href="{{ secure_asset('mapir/css/mapp.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('mapir/css/fa/style.css') }}">

    <div id="map"
         class="p-map fixed"
    ></div>

    <script type="text/javascript" src="{{ secure_asset('js/site/runtime.js') }}" defer ></script>
    <script type="text/javascript" src="{{ secure_asset('mapir/js/jquery-3.2.1.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ secure_asset('mapir/js/mapp.env.js') }}" defer></script>
    <script type="text/javascript" src="{{ secure_asset('mapir/js/mapp.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ secure_asset('js/site/map.js') }}" defer></script>