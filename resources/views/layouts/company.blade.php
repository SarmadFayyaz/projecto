<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
    @yield('style')
</head>
<body class="{{(Auth::guard('company')->user()->sidebar_size == 1) ? 'sidebar-mini' : ''}}">
<div class="wrapper ">
    @include('include.backend.company.sidebar')
    <div class="main-panel">
        @include('include.backend.company.header')
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

@include('include.backend.company.script')

@yield('script')

</body>
</html>
