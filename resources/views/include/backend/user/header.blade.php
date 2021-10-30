@php
(isset($page) ?: $page = 0);$notifications_user = getNotifications();@endphp
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round btn-sm">
                    <i class="fas fa-arrow-left text_align-center visible-on-sidebar-regular"></i> <i class="fas fa-arrow-left design_bullet-list-67 visible-on-sidebar-mini"></i>
                </button>
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
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" id="my_notifications">
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
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{ route('profile.index') }}"> {{ __('header.profile') }} </a>
                        @if(Session('locale')=="en")
                            <a class="dropdown-item" href="{{url('language/de')}}">Spanish</a>
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
