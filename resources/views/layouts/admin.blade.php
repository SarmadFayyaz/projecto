<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.backend.head')
    @yield('style')
</head>
<body class="{{(Auth::guard('admin')->user()->sidebar_size === '0') ? '' : 'sidebar-mini'}}">
    <div class="text-center spinner-overlay">
        <div class="spinner-grow spinner text-{{ $theme }}" role="status" >
            <span class="sr-only">Loading...</span>
        </div>
    </div>
<div class="wrapper ">
    @include('include.backend.admin.sidebar')
    <div class="main-panel">
        @include('include.backend.admin.header')
        <style>
            .main-panel .content {
                padding-bottom: 0px !important;
                margin-bottom: 0px !important

            }
        </style>
        @yield('content')
        @include('include.backend.footer')
    </div>
</div>
{{--@include('include.backend.admin.side-plugin')--}}

    @include('include.backend.script')
@include('include.backend.admin.script')

@yield('script')

</body>
</html>
