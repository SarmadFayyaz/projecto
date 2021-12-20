<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('include.backend.head')
        <style>
            .dropdown-menu .dropdown-item:hover, .dropdown-menu .dropdown-item:focus, .dropdown-menu a:hover, .dropdown-menu a:focus, .dropdown-menu a:active {
                box-shadow: 0 4px 20px 0px {{ '#' . getThemeColor( $theme ) . '24' }}, 0 7px 10px -5px{{ '#' . getThemeColor( $theme ) . '66' }};
                background-color: {{ '#' . getThemeColor( $theme ) }};
            }

            .bootstrap-select .dropdown-item.active {
                background: {{ '#' . getThemeColor( $theme ) }};
            }

            .bootstrap-select .btn.dropdown-toggle.select-with-transition {
                background-image: linear-gradient(to top, {{ '#' . getThemeColor( $theme ) }} 2px, rgba(54, 186, 175, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
            }

            .pagination > .page-item.active > a, .pagination > .page-item.active > a:focus, .pagination > .page-item.active > a:hover, .pagination > .page-item.active > span, .pagination > .page-item.active > span:focus, .pagination > .page-item.active > span:hover {
                background-color: {{ '#' . getThemeColor( $theme ) }};
                border-color: {{ '#' . getThemeColor( $theme ) }};
                box-shadow: 0 4px 5px 0 {{ '#' . getThemeColor( $theme ) . '24' }}, 0 1px 10px 0 {{ '#' . getThemeColor( $theme ) . '1F' }}, 0 2px 4px -1px{{ '#' . getThemeColor( $theme ) . '33' }};
            }

            .form-control, .is-focused .form-control {

                background-image: linear-gradient(to top, {{ '#' . getThemeColor( $theme ) }} 2px, rgba(54, 186, 175, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
            }

            .card-collapse .card-header a:hover, .card-collapse .card-header a:active, .card-collapse .card-header a[aria-expanded="true"] {
                color: {{ '#' . getThemeColor( $theme ) }};
            }
        </style>
        @yield('style')
    </head>
    <body class="{{(Auth::user()->sidebar_size == 0) ? '' : 'sidebar-mini'}}">
        <div class="text-center spinner-overlay">
            <div class="spinner-grow spinner text-{{ $theme }}" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="wrapper" style="height: auto;">
            @include('include.backend.user.sidebar')
            <div class="main-panel" style="height: auto">

                @include('include.backend.user.header')
                <div class="content pt-0 pb-0">
                    @yield('content')
                    @include('include.backend.footer')
                </div>
            </div>
        </div>
        {{--        @include('include.backend.user.side-plugin')--}}

        @include('include.backend.script')
        @include('include.backend.user.script')

        @yield('script')

    </body>
</html>
