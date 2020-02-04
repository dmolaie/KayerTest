<!DOCTYPE html>
<html lang="fa">
@include('fa.template.part-theme.head')
<body class="overflow-x-hidden">
@include('fa.template.part-theme.header')
<main>
    @yield('content')
</main>
@include('fa.template.part-theme.footer')
</body>
</html>