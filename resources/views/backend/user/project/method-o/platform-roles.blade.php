<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        {{ __('header.platform_roles') }} </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar">
    <div class="pl-3 pr-3 pt-2 pb-2">
        <ul class="nav nav-pills nav-pills-{{ $theme }} mb-3 p-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#sponsor" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    {{ __('header.mo_pr_sponsor') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#manager_boss" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    {{ __('header.mo_pr_manager') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#team_members_div" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    {{ __('header.mo_pr_team_members') }}
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="sponsor">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                        <h4 class="font-weight-bold"> {{ __('header.mo_pr_sponsor') }} </h4>
                        <p>
                            {{ __('header.mo_pr_sponsor_1') }}<br>
                            {{ __('header.mo_pr_sponsor_2') }}<br>
                            {{ __('header.mo_pr_sponsor_3') }}<br>
                            {{ __('header.mo_pr_sponsor_4') }}<br>
                            {{ __('header.mo_pr_sponsor_5') }}<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="manager_boss">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                        <h4 class="font-weight-bold"> {{ __('header.mo_pr_manager') }} </h4>
                        <p>
                            {{ __('header.mo_pr_manager_1') }}<br>
                            {{ __('header.mo_pr_manager_2') }}<br>
                            {{ __('header.mo_pr_manager_3') }}<br>
                            {{ __('header.mo_pr_manager_4') }}<br>
                            {{ __('header.mo_pr_manager_5') }}<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="team_members_div">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                        <h4 class="font-weight-bold"> {{ __('header.mo_pr_team_members') }} </h4>
                        <p>
                            {{ __('header.mo_pr_team_members_1') }}<br>
                            {{ __('header.mo_pr_team_members_2') }}<br>
                            {{ __('header.mo_pr_team_members_3') }}<br>
                            {{ __('header.mo_pr_team_members_4') }}<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
