@php
(isset($page) ?: $page = 0);$notifications_user = getNotifications();@endphp
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <a href="{{ url()->previous() }}" id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round btn-sm">
                    <i class="fas fa-arrow-left text_align-center visible-on-sidebar-regular mt-1"></i> <i class="fas fa-arrow-left design_bullet-list-67 visible-on-sidebar-mini mt-1"></i>
                </a>
            </div>
            <a class="navbar-brand " href="javascript:;">
                @yield('title')
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        @stack('desk-video-control')

        <div class="collapse navbar-collapse justify-content-end ">

        @stack('mod-video-control')
        @stack('meeting-general')
        <!-- <li class="nav-item text-center" id="meeting" style="list-style:none;display:none">
                        <a class="nav-link " style="color:black" href="/projectO/meetingmode.php">
                <i class="material-icons">videocam</i><br> Meeting
            </a>
        </li>
            <li class="nav-item text-center" id="general" style="list-style:none;display:none">
                        <a class="nav-link " style="color:#36baaf" href="/projectO/test2.php">
                <i class="material-icons">supervisor_account</i><br> General
            </a>
        </li> -->
            <form class="navbar-form ml-3">
                <div class="input-group no-border">
                    <input type="text" value="" id="search" hidden class="form-control form-control-sm" placeholder="Search...">
                    {{--                    <button type="button" id="btnsearch" style="min-width: 23px !important;width: 23px;margin-bottom: 3px; height: 23px !important;" onclick="btnsearchs()" class="btn btn-white btn-sm btn-round btn-just-icon">--}}
                    <i class="material-icons cursor-pointer ml-2" onclick="btnsearchs()" style="line-height:25px !important;">search</i>
                    <div class="ripple-container"></div>
                    {{--                    </button>--}}
                </div>
            </form>

            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification" id="notification_counter">{{ $notifications_user->where('status', 0)->count() }}</span>
                        <p class="d-lg-none d-md-block">
                            Some Actions </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right overflow-auto" aria-labelledby="navbarDropdownMenuLink" id="my_notifications" style="max-height: 70vh">
                        @foreach($notifications_user as $notification_user)
                            <a class="dropdown-item {{ ($notification_user->status == 0) ? '' : 'bg-light mb-1' }}" href="{{ route('notification.edit', $notification_user->notification_id) }}">
                                @if($notification_user->status == 0)
                                    <span class="mr-2">●</span>
                                @endif
                                {{ $notification_user->notification->notification }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item ">
                    <div class="fixed-plugin">
                        <div class="dropdown show-dropdown">
                            <a href="#" data-toggle="dropdown" >
                                <i class="fa fa-cog text-dark"> </i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header-title"> {{ __('header.sidebar_filter') }} </li>
                                <li class="adjustments-line">
                                    <a href="javascript:void(0)" class="switch-trigger active-color">
                                        <div class="badge-colors ml-auto mr-auto">
                                            <span class="badge filter {{ (isset(auth()->user()->background) && auth()->user()->background == 'primary') ? 'active' : '' }} badge-purple" data-color="primary"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->background) && auth()->user()->background == 'info') ? 'active' : '' }} badge-azure" data-color="info"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->background) && auth()->user()->background == 'success') ? 'active' : '' }} badge-green" data-color="success"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->background) && auth()->user()->background == 'warning') ? 'active' : '' }} badge-warning" data-color="warning"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->background) && auth()->user()->background == 'danger') ? 'active' : '' }} badge-danger" data-color="danger"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->background) && auth()->user()->background == 'rose') ? 'active' : '' }} badge-rose" data-color="rose"></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                                <li class="header-title"> {{ __('header.sidebar_background') }} </li>
                                <li class="adjustments-line">
                                    <a href="javascript:void(0)" class="switch-trigger background-color">
                                        <div class="ml-auto mr-auto">
                                            <span class="badge filter {{ (isset(auth()->user()->sidebar_background) && auth()->user()->sidebar_background == 'black') ? 'active' : '' }} badge-black" data-background-color="black"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->sidebar_background) && auth()->user()->sidebar_background == 'white') ? 'active' : '' }} badge-white" data-background-color="white"></span>
                                            <span class="badge filter {{ (isset(auth()->user()->sidebar_background) && auth()->user()->sidebar_background == 'red') ? 'active' : '' }} badge-red" data-background-color="red"></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                                <li class="adjustments-line">
                                    <a href="javascript:void(0)" class="switch-trigger">
                                        <p>{{ __('header.sidebar_mini') }} </p>
                                        <label class="ml-auto">
                                            <div class="togglebutton switch-sidebar-mini">
                                                <label>
                                                    <input type="checkbox" {{ (isset(auth()->user()->sidebar_size) && auth()->user()->sidebar_size == '1') ? 'checked' : '' }}>
                                                    <span class="toggle"></span>
                                                </label>
                                            </div>
                                        </label>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                            <!-- <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Images</p>
                    <label class="switch-mini ml-auto">
                        <div class="togglebutton switch-sidebar-image">
                            <label>
                                <input type="checkbox" checked="">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('assets/img/sidebar-1.jpg') }}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('assets/img/sidebar-2.jpg') }}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('assets/img/sidebar-3.jpg') }}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('assets/img/sidebar-4.jpg') }}" alt="">
                </a>
            </li> -->
                                <!-- <li class="button-container">
                                    <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank"
                                        class="btn btn-rose btn-block btn-fill">Buy Now</a>
                                    <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.1/getting-started/introduction.html"
                                        target="_blank" class="btn btn-default btn-block">
                                        Documentation
                                    </a>
                                    <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank"
                                        class="btn btn-info btn-block">
                                        Get Free Demo!
                                    </a>
                                </li>
                                <li class="button-container github-star">
                                    <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro"
                                        data-icon="octicon-star" data-size="large" data-show-count="true"
                                        aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                                </li>
                                <li class="header-title">Thank you for 95 shares!</li>
                                <li class="button-container text-center">
                                    <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot;
                                        45</button>
                                    <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot;
                                        50</button>
                                    <br>
                                    <br>
                                </li> -->
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
                        <a class="dropdown-item" href="{{ route('profile.index') }}"> {{ __('header.profile') }} </a>
                        @if(Session('locale')=="en")
                            <a class="dropdown-item" href="{{url('language/es')}}">Spanish</a>
                        @else
                            <a class="dropdown-item" href="{{url('language/en')}}">English</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        {{--                        <a class="dropdown-item" href="#">Log out</a>--}}
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
