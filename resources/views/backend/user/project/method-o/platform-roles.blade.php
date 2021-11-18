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

<div class="modal-body overflow-auto scroll-bar"
     >
    <div class="pl-3 pr-3 pt-2 pb-2">
        <ul class="nav nav-pills nav-pills-{{ $theme }} mb-3 p-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#sponsor" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    SPONSOR
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#manager_boss" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    PROJECT MANAGER / BOSS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#team_members" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    TEAM MEMBERS
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="sponsor">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                        <h4 class="font-weight-bold">
                            SPONSOR </h4>
                        <p>
                            Project sponsor. <br> Supports the project manager to realize the vision of the organization and the corporate objectives of the organization.<br> Responsible for ensuring the resources, visibility and
                            transmitting the experience required for the success of the project.<br> Must constantly engage with the project manager and participate in key meetings or milestones.<br> Ensure that the project is sustained and
                            maintain communication with the corresponding authorities.<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="manager_boss">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                        <h4 class="font-weight-bold">
                            PROJECT MANAGER </h4>
                        <p>
                            The project responsible, in front of the authorities of the organization, that the project is carried out. <br> Manages the project and team.<br> Decides what to do and when to do it, prioritizing the list of
                            tasks and actions.<br> It relies on the Sponsor to mobilize resources to ensure the success of the project and negotiates with him.<br> Directs the work team meetings, defines the agenda, manages the action plan,
                            articulates and facilitates the participation of all members.<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="team_members">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                        <h4 class="font-weight-bold">
                            TEAM MEMBERS </h4>
                        <p>
                            Responsible for the tasks committed for the development of the project. <br> They participate in periodic meetings agreed upon among themselves, according to needs, or cited by the project manager. <br> They
                            collaborate openly with team members following established agreements. <br> They have the responsibility and authority to raise issues that may harm or help the success of the project. <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
