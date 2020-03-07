<!DOCTYPE html>
<html lang="fa" class="h-full overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#03b6f9">
    <meta name="msapplication-navbutton-color" content="#03b6f9">
    <meta name="apple-mobile-web-app-status-bar-style" content="#03b6f9">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/appStyle.css') }}" rel="stylesheet">
    <title>
        اهدا
    </title>
</head>
<body class="h-full overflow-x-hidden">
    <div id="app"></div>
    <script src="{{ asset('js/office/runtime.js ') }}" defer></script>
    <script src="{{ asset('js/office/vendors~app.js') }}" defer></script>
    <script src="{{ asset('js/office/app.js') }}" defer></script>
</body>
</html>