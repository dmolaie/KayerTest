<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('fa.template.part-theme.head')
<body class="overflow-x-hidden">
@include('fa.template.part-theme.header')
<main>
    @yield('content')
</main>
@include('fa.template.part-theme.footer')
<script src="{{ asset('js/runtime.js') }}" defer ></script>
<script src="{{ asset('js/master.js') }}" defer ></script>
@yield('scripts')
</body>
</html>