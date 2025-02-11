
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
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
