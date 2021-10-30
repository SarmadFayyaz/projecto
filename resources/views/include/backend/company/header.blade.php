<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round btn-sm">
                    <i class="fas fa-arrow-left text_align-center visible-on-sidebar-regular"></i> <i class="fas fa-arrow-left design_bullet-list-67 visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand small-text" href="javascript:;">
                @yield('title')
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end ">
            <ul class="nav nav-pills nav-pills-warning ulitm" role="tablist" hidden>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" id="meeting" href="#link2" role="tablist">
                        <i class="material-icons" style="padding:0px;font-size:22px">videocam</i><br> Meeting

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active show" id="general" data-toggle="tab" href="#link1" role="tablist">
                        <i class="material-icons" style="padding:0px;font-size:22px">supervisor_account</i><br> General
                    </a>
                </li>

            </ul>
            <form class="navbar-form ml-3">
                <div class="input-group no-border">
                    <input type="text" value="" id="search" hidden class="form-control form-control-sm" placeholder="Search...">
{{--                    <button type="button" id="btnsearch" style="min-width: 23px !important;width: 23px;margin-bottom: 3px; height: 23px !important;" onclick="btnsearchs()" class="btn btn-white btn-sm btn-round btn-just-icon">--}}
                        <i class="material-icons cursor-pointer ml-2" style="line-height:25px !important;" onclick="btnsearchs()" >search</i>
                        <div class="ripple-container"></div>
{{--                    </button>--}}
                </div>
            </form>

            <ul class="navbar-nav ">
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"--}}
                {{--                       data-toggle="dropdown"--}}
                {{--                       aria-haspopup="true" aria-expanded="false">--}}
                {{--                        <i class="material-icons">notifications</i>--}}
                {{--                        <span class="notification">5</span>--}}
                {{--                        <p class="d-lg-none d-md-block">--}}
                {{--                            Some Actions--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                {{--                        <a class="dropdown-item" href="#">Mike John responded to your email</a>--}}
                {{--                        <a class="dropdown-item" href="#">You have 5 new tasks</a>--}}
                {{--                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>--}}
                {{--                        <a class="dropdown-item" href="#">Another Notification</a>--}}
                {{--                        <a class="dropdown-item" href="#">Another One</a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{ route('company.profile.index') }}">{{ __('header.profile') }}</a>
                        @if(Session('locale')=="en")
                            <a class="dropdown-item" href="{{url('language/de')}}">Spanish</a>
                        @else
                            <a class="dropdown-item" href="{{url('language/en')}}">English</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
