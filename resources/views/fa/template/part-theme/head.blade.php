<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#004883">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-navbutton-color" content="#004883">
    <meta name="apple-mobile-web-app-status-bar-style" content="#004883">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-TileImage" content="{{ secure_asset('images/favicon/ms-icon-144x144.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('images/favicon/apple-icon-180x180.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ secure_asset('images/favicon/apple-icon-152x152.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ secure_asset('images/favicon/apple-icon-144x144.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ secure_asset('images/favicon/apple-icon-120x120.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ secure_asset('images/favicon/apple-icon-114x114.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('images/favicon/apple-icon-76x76.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ secure_asset('images/favicon/apple-icon-72x72.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ secure_asset('images/favicon/apple-icon-60x60.png?v=c298c7f8233d') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ secure_asset('images/favicon/apple-icon-57x57.png?v=c298c7f8233d') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ secure_asset('images/favicon/android-icon-192x192.png?v=c298c7f8233d') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ secure_asset('images/favicon/favicon-96x96.png?v=c298c7f8233d') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('images/favicon/favicon-32x32.png?v=c298c7f8233d') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/favicon/favicon-16x16.png?v=c298c7f8233d') }}">
    <link rel="icon" type="image/x-icon" href="{{ secure_asset('images/favicon/favicon.ico?v=c298c7f8233d') }}">
    <link href="{{ secure_asset('images/favicon/favicon.ico?v=c298c7f8233d') }}" rel="shortcut icon">
    @yield('meta')
    <link rel="stylesheet" href="{{secure_asset('css/style.css?v=c298c7f8333sd')}}" />
    @yield('styles')
    <title>
        انجمن اهدای عضو ایرانیان
        @yield('title')
    </title>
</head>