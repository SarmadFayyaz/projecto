<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('include.backend.auth.head')
    </head>
    <body class="text-capitalize">

        @yield('content')

        @include('include.backend.script')
        @yield('script')

    </body>
</html>
