<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <a href="{{ url()->previous() }}" id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round btn-sm">
                    <i class="fas fa-arrow-left text_align-center visible-on-sidebar-regular mt-1"></i> <i class="fas fa-arrow-left design_bullet-list-67 visible-on-sidebar-mini mt-1"></i>
                </a>
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
                    <i class="material-icons cursor-pointer ml-2" style="line-height:25px !important;" onclick="btnsearchs()">search</i>
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
                <li class="nav-item">

                    <div class="fixed-plugin">
                        <div class="dropdown show-dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="fa fa-cog text-dark"> </i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header-title"> Sidebar Filters</li>
                                <li class="adjustments-line">
                                    <a href="javascript:void(0)" class="switch-trigger active-color">
                                        <div class="badge-colors ml-auto mr-auto">
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->background) && Auth::guard('admin')->user()->background == 'primary') ? 'active' : '' }} badge-purple"
                                                  data-color="primary"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->background) && Auth::guard('admin')->user()->background == 'info') ? 'active' : '' }} badge-azure" data-color="info"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->background) && Auth::guard('admin')->user()->background == 'success') ? 'active' : '' }} badge-green" data-color="success"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->background) && Auth::guard('admin')->user()->background == 'warning') ? 'active' : '' }} badge-warning"
                                                  data-color="warning"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->background) && Auth::guard('admin')->user()->background == 'danger') ? 'active' : '' }} badge-danger" data-color="danger"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->background) && Auth::guard('admin')->user()->background == 'rose') ? 'active' : '' }} badge-rose" data-color="rose"></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                                <li class="header-title">Sidebar Background</li>
                                <li class="adjustments-line">
                                    <a href="javascript:void(0)" class="switch-trigger background-color">
                                        <div class="ml-auto mr-auto">
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->sidebar_background) && Auth::guard('admin')->user()->sidebar_background == 'black') ? 'active' : '' }} badge-black"
                                                  data-background-color="black"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->sidebar_background) && Auth::guard('admin')->user()->sidebar_background == 'white') ? 'active' : '' }} badge-white"
                                                  data-background-color="white"></span>
                                            <span class="badge filter {{ (isset(Auth::guard('admin')->user()->sidebar_background) && Auth::guard('admin')->user()->sidebar_background == 'red') ? 'active' : '' }} badge-red"
                                                  data-background-color="red"></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                                <li class="adjustments-line">
                                    <a href="javascript:void(0)" class="switch-trigger">
                                        <p>Sidebar Mini</p>
                                        <label class="ml-auto">
                                            <div class="togglebutton switch-sidebar-mini">
                                                <label>
                                                    <input type="checkbox" {{ (isset(Auth::guard('admin')->user()->sidebar_size) && Auth::guard('admin')->user()->sidebar_size == '1') ? 'checked' : '' }}>
                                                    <span class="toggle"></span>
                                                </label>
                                            </div>
                                        </label>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{ route('admin.profile.index') }}">{{ __('header.profile') }}</a>
                        @if(Session('locale')=="en")
                            <a class="dropdown-item" href="{{url('language/es')}}">Spanish</a>
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
