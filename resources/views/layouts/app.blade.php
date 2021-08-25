<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
    @yield('style')
</head>
<body class="">
<div class="wrapper ">
    @include('include.sidebar')
    <div class="main-panel">
        @include('include.header')
        <style>
            .main-panel .content {
                padding-bottom: 0px !important;
                margin-bottom: 0px !important

            }

            .fc-button-group button {
                font-size: 11px !important;
            }
        </style>
        @yield('content')
        @include('include.footer')
    </div>
</div>
@include('include.side-plugin')

@include('include.script')

@yield('script')

</body>
</html>
