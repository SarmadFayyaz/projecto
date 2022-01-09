<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        {{ __('header.initial_project_meeting') }} </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal"
                       aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar" style="max-height: 75vh;">
    <div class="text-white rounded bg-{{ $theme }} pl-5 pr-5 pt-3 pb-3 w-75">
        <h4 class="mb-0 font-weight-bold">{{ __('header.mo_im_purpose') }}</h4>
        <p class=""> {{ __('header.mo_im_purpose_ans') }} </p>
        <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_im_those_who_participate') }} </h4>
        <p class="mb-0"> {{ __('header.mo_im_those_who_participate_ans') }} </p>
    </div>

    <div class="pl-3 pr-3 pt-2 pb-2 mt-3">
        <h4 class="mb-0 font-weight-bold text-center"> {{ __('header.mo_im_session_design') }} </h4>
        <ul class="mb-3">
            <li>{{ __('header.mo_im_session_led_by') }}</li>
            <li> {{ __('header.mo_im_duration') }} </li>
            <li> {{ __('header.mo_im_work_session') }} </li>
        </ul>

        <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_im_context_5_min') }} </h4>
        <p> {{ __('header.mo_im_explain_to_the') }} </p>

        <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_im_meeting_agenda') }}
            @if(auth()->user()->hasRole('Boss'))
                <textarea class="form-control w-50 pull-right border rounded p-2 im_boss_notes" cols="5" rows="5"
                          placeholder="{{ __('header.boss_notes') }}"> {{ ($boss_notes) ? $boss_notes : '' }} </textarea>
            @endif
        </h4>
        <ol class="mb-3">
            <li> {{ __('header.mo_im_meeting_agenda_1') }} </li>
            <li> {{ __('header.mo_im_meeting_agenda_2') }} </li>
            <li> {{ __('header.mo_im_meeting_agenda_3') }} </li>
            <li> {{ __('header.mo_im_meeting_agenda_4') }} </li>
            <li> {{ __('header.mo_im_meeting_agenda_5') }} </li>
            <li> {{ __('header.mo_im_meeting_agenda_6') }} </li>
        </ol>

        <h4 class="mb-0 font-weight-bold">1. &ensp; {{ __('header.mo_im_what_are_the_challenge') }}</h4>
        <ul class="mb-3">
            <li> {{ __('header.mo_im_what_are_the_challenge_1') }} </li>
            <li> {{ __('header.mo_im_what_are_the_challenge_2') }} </li>
            <li> {{ __('header.mo_im_what_are_the_challenge_3') }} </li>
            <li> {{ __('header.mo_im_what_are_the_challenge_4') }} </li>
            <li> {{ __('header.mo_im_what_are_the_challenge_5') }} </li>
        </ul>

        <h4 class="mb-0 font-weight-bold">2. &ensp; {{ __('header.mo_im_project_presentation') }}
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project_id) }}"
               class="project_details btn btn-{{ $theme }} pull-right p-2" style="width: 180px">
                {{ __('header.mo_im_project_information') }}
            </a>
        </h4>
        <ul class="mb-3">
            <li>{{ __('header.mo_im_project_presentation_1') }}</li>
            <li>{{ __('header.mo_im_project_presentation_2') }}</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">3. &ensp; {{ __('header.mo_im_metodo_presentation') }}
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project_id) }}"
               class="project_details btn btn-{{ $theme }} pull-right p-2" style="width: 180px">
                {{ __('header.mo_im_video_mo') }}
            </a>
        </h4>
        <ul class="mb-3">
            <li>{{ __('header.mo_im_metodo_presentation_1') }}</li>
            <li>{{ __('header.mo_im_metodo_presentation_2') }}</li>
            <li>{{ __('header.mo_im_metodo_presentation_3') }}</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">4. &ensp; {{ __('header.mo_im_task_assignment') }}
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} pull-right p-2 open_modal"
               data-modal-id="#addNewTaskModal" style="width: 180px">
                <i class="fa fa-plus mr-2" style="font-size:12px !important"></i> {{ __('header.add_new_task') }}
            </a>
        </h4>
        <ul class="mb-3">
            <li> {{ __('header.mo_im_task_assignment_1') }}</li>
            <li> {{ __('header.mo_im_task_assignment_2') }}</li>
            <li> {{ __('header.mo_im_task_assignment_3') }}</li>
            <li> {{ __('header.mo_im_task_assignment_4') }}</li>
            <li> {{ __('header.mo_im_task_assignment_5') }}</li>
            <li> {{ __('header.mo_im_task_assignment_6') }}</li>
            <li> {{ __('header.mo_im_task_assignment_7') }}</li>
        </ul>
        <h4 class="mb-0 font-weight-bold">5. &ensp; {{ __('header.mo_im_def_of_meeting') }}
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} pull-right p-2 open_modal"
               data-modal-id="#createEventModal" style="width: 180px">
                {{ __('header.mo_im_new_meeting') }}
            </a>
        </h4>
        <p class="mb-0"> {{ __('header.mo_im_def_of_diff_types') }}</p>
        <ul class="">
            <li> {{ __('header.mo_im_def_of_meeting_1') }} </li>
            <li> {{ __('header.mo_im_def_of_meeting_2') }} </li>
            <li> {{ __('header.mo_im_def_of_meeting_3') }} </li>
        </ul>
        <h4 class="mb-0 font-weight-bold text-center"> {{ __('header.mo_im_def_of_meeting_schedule_next_4_weeks') }} </h4>
        <h4 class="font-weight-bold text-center"> {{ __('header.mo_im_def_of_meeting_schedule_weekly_closing') }} </h4>

        <h4 class="mb-0 font-weight-bold">6. &ensp; {{ __('header.mo_im_def_of_internal_rel') }} </h4>
        <p>{{ __('header.mo_im_def_of_internal_rel_1') }}<br> {{ __('header.mo_im_def_of_internal_rel_2') }} </p>
        <p> {{ __('header.mo_im_wr_for_the_proper_functioning') }} </p>
        <p> {{ __('header.mo_im_wr_next_possible_rules_are') }} </p>
        <h4 class="mb-0 font-weight-bold">{{ __('header.mo_im_wr_possible_rules_to_carry_out') }} </h4>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 1)) ? 'checked' : '' }} id="wr_1"
                   name="wr_1" value="1">
        @endif
        <label for="wr_1"> {{ __('header.mo_im_wr_1') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 2)) ? 'checked' : '' }} id="wr_2"
                   name="wr_2" value="2">
        @endif
        <label for="wr_2"> {{ __('header.mo_im_wr_2') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 3)) ? 'checked' : '' }} id="wr_3"
                   name="wr_3" value="3">
        @endif
        <label for="wr_3"> {{ __('header.mo_im_wr_3') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 4)) ? 'checked' : '' }} id="wr_4"
                   name="wr_4" value="4">
        @endif
        <label for="wr_4"> {{ __('header.mo_im_wr_4') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 5)) ? 'checked' : '' }} id="wr_5"
                   name="wr_5" value="5">
        @endif
        <label for="wr_5"> {{ __('header.mo_im_wr_5') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 6)) ? 'checked' : '' }} id="wr_6"
                   name="wr_6" value="6">
        @endif
        <label for="wr_6"> {{ __('header.mo_im_wr_6') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 7)) ? 'checked' : '' }} id="wr_7"
                   name="wr_7" value="7">
        @endif
        <label for="wr_7"> {{ __('header.mo_im_wr_7') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 8)) ? 'checked' : '' }} id="wr_8"
                   name="wr_8" value="8">
        @endif
        <label for="wr_8"> {{ __('header.mo_im_wr_8') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 9)) ? 'checked' : '' }} id="wr_9"
                   name="wr_9" value="9">
        @endif
        <label for="wr_9"> {{ __('header.mo_im_wr_9') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 10)) ? 'checked' : '' }} id="wr_10"
                   name="wr_10" value="10">
        @endif
        <label for="wr_10"> {{ __('header.mo_im_wr_10') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 11)) ? 'checked' : '' }} id="wr_11"
                   name="wr_11" value="11">
        @endif
        <label for="wr_11"> {{ __('header.mo_im_wr_11') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 12)) ? 'checked' : '' }} id="wr_12"
                   name="wr_12" value="12">
        @endif
        <label for="wr_12"> {{ __('header.mo_im_wr_12') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 13)) ? 'checked' : '' }} id="wr_13"
                   name="wr_13" value="13">
        @endif
        <label for="wr_13"> {{ __('header.mo_im_wr_13') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 14)) ? 'checked' : '' }} id="wr_14"
                   name="wr_14" value="14">
        @endif
        <label for="wr_14"> {{ __('header.mo_im_wr_14') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 15)) ? 'checked' : '' }} id="wr_15"
                   name="wr_15" value="15">
        @endif
        <label for="wr_15"> {{ __('header.mo_im_wr_15') }} </label> <br>
        @if(auth()->user()->hasRole('Boss'))
            <input type="checkbox" class="mr-2 wr" {{ (checkWorkRule($project_id, 16)) ? 'checked' : '' }} id="wr_16"
                   name="wr_16" value="16">
        @endif
        <label for="wr_16"> {{ __('header.mo_im_wr_16') }} </label> <br>
    </div>
</div>
