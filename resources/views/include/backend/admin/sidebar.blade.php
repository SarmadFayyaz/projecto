<div class="sidebar {{(Auth::guard('admin')->user()->sidebar_size == 1) ? 'ps' : ''}}"
     data-color="{{ (Auth::guard('admin')->user()->background) ? getSidebarColor(Auth::guard('admin')->user()->background) : 'purple' }}"
     data-background-color="{{ (Auth::guard('admin')->user()->sidebar_background) ? Auth::guard('admin')->user()->sidebar_background : 'white' }}"
     data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="javascript:void(0)" class="simple-text logo-mini">
            MÖ
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal " id="minimizeSidebar">
            {{__('header.project_title')}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ Storage::disk('public')->exists(auth('admin')->user()->image) ? Storage::disk('public')->url(auth('admin')->user()->image) : asset('assets/img/faces/avatar.jpg') }}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample"
                   class="username  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "" : "collapsed")?>"
                   aria-expanded=" <?php echo(($page == "Profile" || $page == "Edit Profile") ? "true" : "false")?>">
                    <span>
                        {{ Auth::guard('admin')->user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "show" : "")?>"
                     id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item <?php echo($page == "Profile" ? "active" : "")?>">
                            <a class="nav-link" href="{{ route('admin.profile.index') }}">
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
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p> {{__('header.dashboard')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Companies" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('admin.company.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <p> {{__('header.companies')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Admins" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('admin.admins.index') }}">
                    <i class="fas fa-user-cog"></i>
                    <p> {{__('header.admins')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Roles" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('admin.role.index') }}">
                    <i class="fas fa-user-tag"></i>
                    <p> {{__('header.roles')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Permissions" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('admin.permission.index') }}">
                    <i class="fas fa-user-shield"></i>
                    <p> {{__('header.permissions')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Method O" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('admin.form.index') }}">
                    <i class="fas fa-layer-group"></i>
                    <p> {{__('header.method_o')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Language" ? "active" : "")?> ">
                <a class="nav-link" href="{{ url('admin/translations/view/header') }}" target="_blank">
                    <i class="fas fa-language"></i>
                    <p> {{__('header.language')}} </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Support" ? "active" : "")?> ">
                <a class="nav-link" href="{{ route('admin.support.index') }}">
                    <i class="material-icons">live_help</i>
                    <p> {{__('header.support')}} </p>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
