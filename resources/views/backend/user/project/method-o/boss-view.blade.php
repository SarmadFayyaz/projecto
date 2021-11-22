<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        {{ __('header.boss_view') }} </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar" style="max-height: 75vh;">
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
                    <div class="col-10">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-3" style="border: 2px dashed; border-radius: 25px;">
                                <h4 class="text-center m-0 font-weight-bold"> {{ __('header.mo_bv_daily_session') }} </h4>
                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_im_purpose') }} </h4>
                                <p class=""> {{ __('header.mo_bv_ds_purpose_def') }} </p>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_ds_purpose_1') }} </li>
                                    <li> {{ __('header.mo_bv_ds_purpose_2') }} </li>
                                </ul>
                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_ds_context') }} </h4>
                                <p class=""> {{ __('header.mo_bv_ds_context_def') }} </p>
                                <ol class="mb-3">
                                    <li>{{ __('header.mo_bv_ds_context_1') }}</li>
                                    <li>{{ __('header.mo_bv_ds_context_2') }}</li>
                                    <li>{{ __('header.mo_bv_ds_context_3') }}</li>
                                </ol>
                                <p class=""> {{ __('header.mo_bv_ds_context_def_2') }} </p>

                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_checklist') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_ds_checklist_1') }} </li>
                                    <li> {{ __('header.mo_bv_ds_checklist_2') }} </li>
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
                    <div class="col-10">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-3" style="border: 2px dashed; border-radius: 25px;">
                                <h4 class="text-center m-0 font-weight-bold"> {{ __('header.mo_bv_retrospective_session') }} </h4>
                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_im_purpose') }} </h4>
                                <p class=""> {{ __('header.mo_bv_rs_purpose_def') }} </p>
                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_rs_those_who_participate') }} </h4>
                                <p class=""> {{ __('header.mo_bv_rs_those_who_participate_def') }} </p>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_rs_rules_1') }} </li>
                                    <li> {{ __('header.mo_bv_rs_rules_2') }} </li>
                                    <li> {{ __('header.mo_bv_rs_rules_3') }} </li>
                                </ul>

                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_rs_context') }} </h4>
                                <p class=""> {{ __('header.mo_bv_rs_context_def') }} </p>

                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_rs_team_conversation') }} </h4>
                                <p class=""> {{ __('header.mo_bv_rs_team_conversation_def') }} </p>

                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_rs_guiding_question') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_rs_guiding_question_1') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_2') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_3') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_4') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_5') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_6') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_7') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_8') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_9') }} </li>
                                    <li> {{ __('header.mo_bv_rs_guiding_question_10') }} </li>
                                </ul>

                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_rs_agreements') }} </h4>
                                <p class="">
                                    {{ __('header.mo_bv_rs_agreements_1') }}<br>
                                    {{ __('header.mo_bv_rs_agreements_2') }}<br>
                                    {{ __('header.mo_bv_rs_agreements_3') }}<br>
                                </p>

                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_checklist') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_rs_checklist_1') }} </li>
                                    <li> {{ __('header.mo_bv_rs_checklist_2') }} </li>
                                    <li> {{ __('header.mo_bv_rs_checklist_3') }} </li>
                                    <li> {{ __('header.mo_bv_rs_checklist_4') }} </li>
                                    <li> {{ __('header.mo_bv_rs_checklist_5') }} </li>
                                    <li> {{ __('header.mo_bv_rs_checklist_6') }} </li>
                                </ul>
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
                    <div class="col-10">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-3" style="border: 2px dashed; border-radius: 25px;">
                                <h4 class="text-center m-0 font-weight-bold"> {{ __('header.mo_bv_follow_up_session') }} </h4>
                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_im_purpose') }} </h4>
                                <p class=""> {{ __('header.mo_bv_fs_purpose_def') }} </p>
                                <h4 class="m-0 font-weight-bold"> {{ __('header.mo_bv_rs_those_who_participate') }} </h4>
                                <p class=""> {{ __('header.mo_bv_rs_those_who_participate_def') }} </p>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_fs_rules_1') }} </li>
                                    <li> {{ __('header.mo_bv_fs_rules_2') }} </li>
                                    <li> {{ __('header.mo_bv_fs_rules_3') }} </li>
                                    <li> {{ __('header.mo_bv_fs_rules_4') }} </li>
                                    <p><small>{{ __('header.mo_bv_fs_rules_5') }}</small></p>
                                </ul>

                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_bv_fs_context') }} </h4>
                                <p>{{ __('header.mo_bv_fs_context_1') }} <br> {{ __('header.mo_bv_fs_context_2') }} </p>

                                <h4 class="mb-3 font-weight-bold"> {{ __('header.mo_bv_fs_follow_up_meeting_that') }} </h4>

                                <h4 class="mb-0 font-weight-bold">1. {{ __('header.mo_bv_fs_conversation_about_project') }} </h4>
                                <p> {{ __('header.mo_bv_fs_conversation_about_project_def_1') }} <br> {{ __('header.mo_bv_fs_conversation_about_project_def_2') }} </p>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_1') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_2') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_3') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_4') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_5') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_6') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_project_7') }} </li>
                                </ul>

                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_bv_fs_open_question') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_fs_open_question_a_1') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_a_2') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_a_3') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_a_4') }} </li>
                                </ul>

                                <h4 class="mb-0 font-weight-bold"> 2. {{ __('header.mo_bv_fs_conversation_about_team') }} </h4>
                                <p> {{ __('header.mo_bv_fs_conversation_about_team_def') }} </p>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_fs_conversation_about_team_1') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_team_2') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_team_3') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_team_4') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_team_5') }} </li>
                                    <li> {{ __('header.mo_bv_fs_conversation_about_team_6') }} </li>
                                </ul>

                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_bv_fs_open_question') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_fs_open_question_b_1') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_b_2') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_b_3') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_b_4') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_b_5') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_b_6') }} </li>
                                    <li> {{ __('header.mo_bv_fs_open_question_b_7') }} </li>
                                </ul>

                                <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_checklist') }} </h4>
                                <ul class="mb-3">
                                    <li> {{ __('header.mo_bv_fs_checklist_1') }} </li>
                                    <li> {{ __('header.mo_bv_fs_checklist_2') }} </li>
                                    <li> {{ __('header.mo_bv_fs_checklist_3') }} </li>
                                    <li> {{ __('header.mo_bv_fs_checklist_4') }} </li>
                                    <li> {{ __('header.mo_bv_fs_checklist_5') }} </li>
                                    <li> {{ __('header.mo_bv_fs_checklist_6') }} </li>
                                </ul>
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
