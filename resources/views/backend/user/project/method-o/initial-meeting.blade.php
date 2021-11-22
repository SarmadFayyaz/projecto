<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        {{ __('header.initial_project_meeting') }} </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
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

        <h4 class="mb-0 font-weight-bold"> {{ __('header.mo_im_meeting_agenda') }} </h4>
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
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project_id) }}" class="project_details btn btn-{{ $theme }} pull-right p-2" style="width: 180px">
                {{ __('header.mo_im_project_information') }}
            </a>
        </h4>
        <ul class="mb-3">
            <li>{{ __('header.mo_im_project_presentation_1') }}</li>
            <li>{{ __('header.mo_im_project_presentation_2') }}</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">3. &ensp; {{ __('header.mo_im__metodo_presentation') }}
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project_id) }}" class="project_details btn btn-{{ $theme }} pull-right p-2" style="width: 180px">
                {{ __('header.mo_im_video_mo') }}
            </a>
        </h4>
        <ul class="mb-3">
            <li>{{ __('header.mo_im__metodo_presentation_1') }}</li>
            <li>{{ __('header.mo_im__metodo_presentation_2') }}</li>
            <li>{{ __('header.mo_im__metodo_presentation_3') }}</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">4. &ensp; {{ __('header.mo_im_task_assignment') }}
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} pull-right p-2 open_modal" data-modal-id="#addNewTaskModal" style="width: 180px">
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
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} pull-right p-2 open_modal" data-modal-id="#createEventModal" style="width: 180px">
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
        <p> {{ __('header.mo_im_this_list_can_be') }} </p>
        <input type="checkbox" id="checkbox1" name="checkbox1" value="Lorem">
        <label for="checkbox1"> Lorem Ipsum dolar sit amet.</label> <br>
        <input type="checkbox" id="checkbox2" name="checkbox2" value="Lorem">
        <label for="checkbox2"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox3" name="checkbox3" value="Lorem">
        <label for="checkbox3"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox4" name="checkbox4" value="Lorem">
        <label for="checkbox4"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox5" name="checkbox5" value="Lorem">
        <label for="checkbox5"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox6" name="checkbox6" value="Lorem">
        <label for="checkbox6"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox7" name="checkbox7" value="Lorem">
        <label for="checkbox7"> Lorem Ipsum dolar sit amet.</label>
    </div>
</div>
