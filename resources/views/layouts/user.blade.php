<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('include.head')
        @yield('style')
    </head>
    <body class="sidebar-mini">
        <div class="wrapper" style="height: auto;">
            @include('include.backend.user.sidebar')
            <div class="main-panel" style="height: auto">
                @include('include.backend.user.header')
                <style>
                    /*.main-panel .content {*/
                    /*    padding-bottom: 0px !important;*/
                    /*    margin-bottom: 0px !important*/

                    /*}*/

                    .fc-button-group button {
                        font-size: 11px !important;
                    }
                </style>
                <div class="content pt-0 pb-0">
                    @yield('content')
                    @include('include.footer')
                </div>
            </div>
        </div>
        @include('include.side-plugin')

        @include('include.backend.user.script')

        @yield('script')

    </body>
</html>
