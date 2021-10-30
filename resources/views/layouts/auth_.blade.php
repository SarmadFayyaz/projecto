<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
</head>
<body class="text-capitalize" style="min-height: 100vh; max-height: 1000px; display: grid; height: 100%; align-items: center;">

@yield('content')

@include('include.script')


</body>
</html>
