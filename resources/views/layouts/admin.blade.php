<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
    @yield('style')
</head>
<body class="text-capitalize {{(Auth::guard('admin')->user()->sidebar_size == 1) ? 'sidebar-mini' : ''}}">
<div class="wrapper ">
    @include('include.backend.admin.sidebar')
    <div class="main-panel">
        @include('include.backend.admin.header')
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
@include('include.backend.admin.side-plugin')

@include('include.backend.admin.script')

@yield('script')

</body>
</html>
