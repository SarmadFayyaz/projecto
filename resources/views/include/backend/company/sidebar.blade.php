<div class="sidebar {{(Auth::guard('company')->user()->sidebar_size == 1) ? 'ps' : ''}}"
     data-color="{{ (Auth::guard('company')->user()->background) ? getSidebarColor(Auth::guard('company')->user()->background) : 'purple' }}"
     data-background-color="{{ (Auth::guard('company')->user()->sidebar_background) ? Auth::guard('company')->user()->sidebar_background : 'white' }}"
     data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="javascript:void(0)" class="simple-text logo-mini">
            PO
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal " id="minimizeSidebar">
            {{__('header.project_title')}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ Storage::disk('public')->exists(auth('company')->user()->image) ? Storage::disk('public')->url(auth('company')->user()->image) : asset('assets/img/faces/avatar.jpg') }}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample"
                   class="username  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "" : "collapsed")?>"
                   aria-expanded=" <?php echo(($page == "Profile" || $page == "Edit Profile") ? "true" : "false")?>">
                    <span>
                        {{ Auth::guard('company')->user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "show" : "")?>"
                     id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item <?php echo($page == "Profile" ? "active" : "")?>">
                            <a class="nav-link" href="{{ route('company.profile.index') }}">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> {{__('header.my_profile')}} </span>
                            </a>
                        </li>
{{--                        <li class="nav-item <?php echo($page == "Edit Profile" ? "active" : "")?>">--}}
{{--                            <a class="nav-link" href="{{ url('edit-profile') }}">--}}
{{--                                <span class="sidebar-mini"> EP </span>--}}
{{--                                <span class="sidebar-normal"> {{__('header.edit_profile')}} </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item  <?php echo($page == "Dashboard" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('company.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p> {{__('header.dashboard')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "users" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('company.user.index') }}">
                    <i class="fas fa-user"></i>
                    <p> {{__('header.users')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "projects" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('company.project.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <p> {{__('header.project')}} </p>
                </a>
            </li>
{{--            <li class="nav-item  <?php echo($page == "Admins" ? "active" : "")?> ">--}}
{{--                <a class="nav-link" href="{{ route('admin.index') }}">--}}
{{--                    <i class="fas fa-user-cog"></i>--}}
{{--                    <p> {{__('header.admins')}} </p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item  <?php echo($page == "Support" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('company.support.index') }}">
                    <i class="material-icons">live_help</i>
                    <p> {{__('header.support')}} </p>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
