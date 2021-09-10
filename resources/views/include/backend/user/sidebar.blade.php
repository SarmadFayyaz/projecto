<style>
    .sidebar-footer {
        min-height: 50px;
        position: absolute;
        width: 100%;
        bottom: 0;
        list-style-type: none;
    }
</style>
<div class="sidebar {{(Auth::user()->sidebar_size == 1) ? 'ps' : ''}}"
     data-color="{{ (Auth::user()->background) ? Auth::user()->background : 'purple' }}"
     data-background-color="{{ (Auth::user()->sidebar_background) ? Auth::user()->sidebar_background : 'white' }}"
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
                <img src="{{ asset('assets/img/faces/avatar.jpg') }}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample"
                   class="username  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "" : "collapsed")?>"
                   aria-expanded=" <?php echo(($page == "Profile" || $page == "Edit Profile") ? "true" : "false")?>">
                    <span>
                        {{ Auth::user()->first_name . ' ' .  Auth::user()->last_name}}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "show" : "")?>"
                     id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item <?php echo($page == "Profile" ? "active" : "")?>">
                            <a class="nav-link" href="{{ url('profile') }}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> {{__('header.my_profile')}} </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo($page == "Edit Profile" ? "active" : "")?>">
                            <a class="nav-link" href="{{ url('edit-profile') }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> {{__('header.edit_profile')}} </span>
                            </a>
                        </li>
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
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> {{__('header.dashboard')}} </p>
                </a>
            </li>
            @php
                $user_projects = getUserProjects();
            @endphp
            @if($user_projects)
                @foreach($user_projects as $user_project)
                    <li class="nav-item  <?php echo($page == $user_project->id ? "active" : "")?>">
                        <a class="nav-link" href="{{ route('project', $user_project->id) }}" style="background: {{getProjectBackground($user_project->color)}}">
                            <i>{{ ucfirst($user_project->name[0]) }}</i>
                            <p class="text-white"> {{ $user_project->name }} </p>
                        </a>
                    </li>
                @endforeach
            @endif
            <div class="sidebar-footer">
                <li class="nav-item   ">

                    <a class="nav-link <?php echo(($page == "Task Requests" || $page == "Projects") ? "" : "collapsed")?> "
                       data-toggle="collapse" href="#tablesExamples1"
                       aria-expanded="<?php echo(($page == "Task Requests" || $page == "Projects") ? "true" : "false")?>">
                        <i class="material-icons">live_help</i>
                        <p> SUPPORT
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse <?php echo(($page == "Task Requests" || $page == "Projects") ? "show" : "")?>"
                         id="tablesExamples1" style="">
                        <ul class="nav">
                            <li class="nav-item <?php echo(($page == "Task Requests") ? "active" : "")?>">
                                <a class="nav-link">
                                    <i class="material-icons">group_work</i>
                                    <p> User Voice </p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </div>
            {{--            <li class="nav-item  <?php echo($page == "Admins" ? "active" : "")?> ">--}}
            {{--                <a class="nav-link" href="{{ route('admin.index') }}">--}}
            {{--                    <i class="fas fa-user-cog"></i>--}}
            {{--                    <p> {{__('header.admins')}} </p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
