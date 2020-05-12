<!DOCTYPE html>
<html class="min:h-full" lang="{{ app()->getLocale() }}">
@include('fa.template.part-theme.head')
<body class="min:h-full overflow-x-hidden">
@include('fa.template.part-theme.header')
<main class="min:h-full">
    @yield('content')
</main>
@include('fa.template.part-theme.footer')
@include('fa.template.part-theme.subdomain')
<script src="{{ secure_asset('js/site/runtime.js') }}" defer ></script>
<script src="{{ secure_asset('js/site/master.js') }}" defer ></script>
@yield('scripts')
</body>
</html>