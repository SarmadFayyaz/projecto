<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        {{ __('header.mo_dm_description_of_meetings') }} </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar"
     style="background-image: url('{{asset(url('assets/img/meeting-modal.jpg'))}}'); background-repeat: no-repeat; background-attachment: fixed; background-position: right; background-size: 520px 500px; max-height: 75vh;">
    <div class="pl-3 pr-3 pt-2 pb-2">
        <ul class="nav nav-pills nav-pills-{{ $theme }} mb-3 p-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#daily_meeting" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    {{ __('header.mo_daily_meeting') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#retrospective_meeting" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    {{ __('header.mo_retrospective_meeting') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#follow_up_meeting" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    {{ __('header.mo_follow_up_meeting') }}
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space" style="min-height: 50vh;">
            <div class="tab-pane active show" id="daily_meeting">
                <div class="row">
                    <div class="col-8">
                        <div class="row justify-content-center">
                            <div class="col-8 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                                <p> {{ __('header.mo_dm_dm_round_of_conversation') }}</p>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_dm_dm_1') }} </li>
                                    <li> {{ __('header.mo_dm_dm_2') }} </li>
                                    <li> {{ __('header.mo_dm_dm_3') }} </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="meeting_time">
                        <i class="fas fa-history fa-4x"></i>
                        <h3 class="m-0"> {{ __('header.mo_15_min') }} </h3>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="retrospective_meeting">
                <div class="row">
                    <div class="col-8">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-4" style="border: 2px dashed; border-radius: 40px;">
                                <p> {{ __('header.mo_dm_rm_after_this_time') }} </p>
                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_dm_rm_what_would_they_say') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_1') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_2') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_3') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_4') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_5') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_6') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_7') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_8') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_9') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_10') }} </li>
                                    <li> {{ __('header.mo_dm_rm_what_would_they_say_11') }} </li>
                                </ul>

                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_dm_rm_agreements') }} </h4>
                                <p class="mb-3"> {{ __('header.mo_dm_rm_agreements_drf') }} </p>
                                <p> {{ __('header.mo_dm_rm_agreements_1') }} <br> {{ __('header.mo_dm_rm_agreements_2') }} <br> {{ __('header.mo_dm_rm_agreements_3') }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="meeting_time">
                        <i class="fas fa-history fa-4x"></i>
                        <h3 class="m-0"> {{ __('header.mo_60_min') }} </h3>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="follow_up_meeting">
                <div class="row">
                    <div class="col-8">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-4" style="border: 2px dashed; border-radius: 40px;">
                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_dm_fm_follow_up_meeting_and') }} </h4>
                                <ol class="mb-3">
                                    <li>{{ __('header.mo_dm_fm_follow_up_meeting_and_1') }}</li>
                                    <li>{{ __('header.mo_dm_fm_follow_up_meeting_and_2') }}</li>
                                </ol>
                                <h4 class="font-weight-bold"> {{ __('header.mo_dm_fm_context_of_meeting') }} </h4>
                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_dm_fm_conversation_about_project') }} </h4>
                                <p>
                                    {{ __('header.mo_dm_fm_conversation_about_project_1') }} <br>
                                    {{ __('header.mo_dm_fm_conversation_about_project_1') }} <br>
                                    {{ __('header.mo_dm_fm_conversation_about_project_1') }}
                                </p>

                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_dm_fm_conversation_on_team') }} </h4>
                                <p>
                                    <span class="font-italic">
                                        {{ __('header.mo_dm_fm_conversation_on_team_def') }}
                                    </span>
                                </p>
                                <p>
                                    {{ __('header.mo_dm_fm_conversation_on_team_1') }} <br>
                                    {{ __('header.mo_dm_fm_conversation_on_team_2') }} <br>
                                    {{ __('header.mo_dm_fm_conversation_on_team_3') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="meeting_time">
                        <i class="fas fa-history fa-4x"></i>
                        <h3 class="m-0"> {{ __('header.mo_45_min') }} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
