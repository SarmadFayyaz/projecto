<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('include.auth.head')
    </head>
    <body class="text-capitalize">

        @yield('content')

        @include('include.script')
        @yield('script')

    </body>
</html>
