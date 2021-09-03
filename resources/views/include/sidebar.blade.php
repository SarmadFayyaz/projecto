<style>
    .sidebar-footer {
    height: 50px;
    position: absolute;
    width: 100%;
    bottom: 0;
    list-style-type: none;
}
</style>
<?php (isset($page) ?:$page = 0) ?>
<div class="sidebar" data-color="purple" data-background-color="white"
     data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="javascript:void(0)" class="simple-text logo-mini">
        MÖ
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal " id="minimizeSidebar">
        Method Ö   
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/faces/avatar.jpg') }}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "" : "collapsed")?>" aria-expanded=" <?php echo(($page == "Profile" || $page == "Edit Profile") ? "true" : "false")?>">
                    <span>
                        Tania Andrew
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse  <?php echo(($page == "Profile" || $page == "Edit Profile") ? "show" : "")?>" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item <?php echo($page == "Profile" ? "active" : "")?>">
                            <a class="nav-link" href="{{ url('profile') }}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item php echo($page == "Edit Profile" ? "active" : "")?>">
                            <a class="nav-link" href="{{ url('edit-profile') }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li> -->
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
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item  <?php echo($page == "Test 2" ? "active" : "")?> ">
                <a class="nav-link" href="{{ url('test') }}">
                    <i class="fas fa-gear"></i>
                    <p> Test 2 </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo(($page == "Task Requests" || $page == "Projects") ? "" : "collapsed")?> " data-toggle="collapse" href="#tablesExamples" aria-expanded="<?php echo(($page == "Task Requests" || $page == "Projects") ? "true" : "false")?>">
                    <i class="material-icons">settings</i>
                    <p> Opciones
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo(($page == "Task Requests" || $page == "Projects") ? "show" : "")?>" id="tablesExamples" style="">
                    <ul class="nav">
                        <li class="nav-item <?php echo(($page == "Task Requests") ? "active" : "")?>">
                            <a class="nav-link" href="{{ url('task-requests') }}">
                                <i class="material-icons">group_work</i>
                                <p> Task Requests </p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo(($page == "Projects") ? "active" : "")?>">
                            <a class="nav-link" href="{{ url('projects') }}">
                                <i class="material-icons">add_box</i>
                                <p>All Projects</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <div class="sidebar-footer">
                    <li class="nav-item   ">
                        
                    <a class="nav-link <?php echo(($page == "Task Requests" || $page == "Projects") ? "" : "collapsed")?> " data-toggle="collapse" href="#tablesExamples1" aria-expanded="<?php echo(($page == "Task Requests" || $page == "Projects") ? "true" : "false")?>">
                    <i class="material-icons">live_help</i>
                    <p> SUPPORT
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo(($page == "Task Requests" || $page == "Projects") ? "show" : "")?>" id="tablesExamples1" style="">
                    <ul class="nav">
                        <li class="nav-item <?php echo(($page == "Task Requests") ? "active" : "")?>">
                            <a class="nav-link" >
                                <i class="material-icons">group_work</i>
                                <p> User Voice </p>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                </li>

                </div>
        <!--  <li class="nav-item <?php echo($page == "Tasks Requests" || $page == "Projects" ? "active" : "")?> ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">apps</i>
                    <p> Choices
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="tasks-requests.php">
                                <span class="sidebar-mini"> TR </span>
                                <span class="sidebar-normal"> Task Requests </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="projects.php">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Projects </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>



            <li class="nav-item  ?php echo($page == "Help" ? "active" : "")?> ">
                <a class="nav-link" href="help.php">
                    <i class="fas fa-question-circle"></i>
                    <p> Help </p>
                </a>
            </li> -->
            <!-- <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">image</i>
                    <p> Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Pricing </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/rtl.html">
                                <span class="sidebar-mini"> RS </span>
                                <span class="sidebar-normal"> RTL Support </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/timeline.html">
                                <span class="sidebar-mini"> T </span>
                                <span class="sidebar-normal"> Timeline </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/login.html">
                                <span class="sidebar-mini"> LP </span>
                                <span class="sidebar-normal"> Login Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/register.html">
                                <span class="sidebar-mini"> RP </span>
                                <span class="sidebar-normal"> Register Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/lock.html">
                                <span class="sidebar-mini"> LSP </span>
                                <span class="sidebar-normal"> Lock Screen Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/user.html">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal"> User Profile </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/error.html">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal"> Error Page </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                    <i class="material-icons">apps</i>
                    <p> Components
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                                <span class="sidebar-mini"> MLT </span>
                                <span class="sidebar-normal"> Multi Level Collapse
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse" id="componentsCollapse">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#0">
                                            <span class="sidebar-mini"> E </span>
                                            <span class="sidebar-normal"> Example </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/buttons.html">
                                <span class="sidebar-mini"> B </span>
                                <span class="sidebar-normal"> Buttons </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/grid.html">
                                <span class="sidebar-mini"> GS </span>
                                <span class="sidebar-normal"> Grid System </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/panels.html">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Panels </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/sweet-alert.html">
                                <span class="sidebar-mini"> SA </span>
                                <span class="sidebar-normal"> Sweet Alert </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/notifications.html">
                                <span class="sidebar-mini"> N </span>
                                <span class="sidebar-normal"> Notifications </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/icons.html">
                                <span class="sidebar-mini"> I </span>
                                <span class="sidebar-normal"> Icons </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/components/typography.html">
                                <span class="sidebar-mini"> T </span>
                                <span class="sidebar-normal"> Typography </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">content_paste</i>
                    <p> Forms
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/forms/regular.html">
                                <span class="sidebar-mini"> RF </span>
                                <span class="sidebar-normal"> Regular Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/forms/extended.html">
                                <span class="sidebar-mini"> EF </span>
                                <span class="sidebar-normal"> Extended Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/forms/validation.html">
                                <span class="sidebar-mini"> VF </span>
                                <span class="sidebar-normal"> Validation Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/forms/wizard.html">
                                <span class="sidebar-mini"> W </span>
                                <span class="sidebar-normal"> Wizard </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">grid_on</i>
                    <p> Tables
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/regular.html">
                                <span class="sidebar-mini"> RT </span>
                                <span class="sidebar-normal"> Regular Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/extended.html">
                                <span class="sidebar-mini"> ET </span>
                                <span class="sidebar-normal"> Extended Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/datatables.net.html">
                                <span class="sidebar-mini"> DT </span>
                                <span class="sidebar-normal"> DataTables.net </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">place</i>
                    <p> Maps
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/maps/google.html">
                                <span class="sidebar-mini"> GM </span>
                                <span class="sidebar-normal"> Google Maps </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/maps/fullscreen.html">
                                <span class="sidebar-mini"> FSM </span>
                                <span class="sidebar-normal"> Full Screen Map </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/maps/vector.html">
                                <span class="sidebar-mini"> VM </span>
                                <span class="sidebar-normal"> Vector Map </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/widgets.html">
                    <i class="material-icons">widgets</i>
                    <p> Widgets </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/charts.html">
                    <i class="material-icons">timeline</i>
                    <p> Charts </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/calendar.html">
                    <i class="material-icons">date_range</i>
                    <p> Calendar </p>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="sidebar-background"></div>
    
</div>




