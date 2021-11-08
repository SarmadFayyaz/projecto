<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
        <h4 class="modal-title font-weight-bold">{{ __('header.project_details') }}</h4>
        <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
    </div>
</div>

<div class="modal-body card-body scroll-bar">
    <div id="project_tab" role="tablist">
        <div class="card m-0 mb-3 rounded-top">
            <div class="card-collapse">
                <div class="card-header p-3" role="tab" id="basic_information_heading">
                    <a data-toggle="collapse" href="#basic_information" aria-expanded="true" aria-controls="basic_information" class="">
                        <h4 class="m-0">
                            {{ __('header.basic_information') }}
                            <i class="material-icons">keyboard_arrow_down</i>
                        </h4>
                    </a>
                </div>
                <div id="basic_information" class="collapse show" role="tabpanel" data-parent="#project_tab" aria-labelledby="basic_information_heading" style="">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-4">{{ __('header.project_name') }}</div>
                            <div class="col-8"><h4 class="m-0 font-weight-bold">{{ ($project->name) ? $project->name : '' }}</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-4">{{ __('header.strategic_goal') }}</div>
                            <div class="col-8"><h4 class="m-0 font-weight-bold">{{ ($project->strategic_goal) ? $project->strategic_goal : '' }}</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-4">{{ __('header.purpose') }}</div>
                            <div class="col-8"><h4 class="m-0 font-weight-bold">{{ ($project->purpose) ? $project->purpose : '' }}</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-2">{{ __('header.start_date') }}</div>
                            <div class="col-4"><h4 class="m-0 font-weight-bold">{{ ($project->start_date) ? $project->start_date : '' }}</h4></div>
                            <div class="col-2">{{ __('header.end_date') }}</div>
                            <div class="col-4"><h4 class="m-0 font-weight-bold">{{ ($project->end_date) ? $project->end_date : '' }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-0 mb-3 rounded-top">
            <div class="card-collapse">
                <div class="card-header p-3" role="tab" id="more_about_heading">
                    <a data-toggle="collapse" href="#more_about" aria-expanded="false" aria-controls="more_about" class="collapsed">
                        <h4 class="m-0">
                            {{ __('header.more_about_project') }}
                            <i class="material-icons">keyboard_arrow_down</i>
                        </h4>
                    </a>
                </div>
                <div id="more_about" class="collapse" role="tabpanel" data-parent="#project_tab" aria-labelledby="more_about_heading" style="">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-4">{{ __('header.project_goal') }}</div>
                            <div class="col-8"><h4 class="m-0 font-weight-bold">{{ ($project->project_goal) ? $project->project_goal : '' }}</h4></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">{{ __('header.boss_leader') }}</div>
                            <div class="col-8"><h4
                                    class="m-0 font-weight-bold">{{ ($project->projectLeader->first_name) ? $project->projectLeader->first_name : '' }} {{ ($project->projectLeader->last_name) ? $project->projectLeader->last_name : '' }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="bg-{{ $theme }} p-2 rounded-top">
                                    <h5 class="m-0 text-center text-white font-weight-bold">{{ __('header.tasks') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div id="task_tab" class="overflow-auto scroll-bar-appended" role="tablist" style="height:auto; max-height: 30vh">
                            @foreach($project->task as $task)
                                <div class="mb-0 w-100 h-100">
                                    <div class="card-collapse">
                                        <div class="card-header p-2" role="tab" id="task_heading_{{ $loop->index }}">
                                            <a data-toggle="collapse" href="#task_{{ $loop->index }}" aria-expanded="false" aria-controls="task_{{ $loop->index }}" class="collapsed">
                                                <h6 class="m-0 font-weight-bold">
                                                    {{ ($task->name) ? $task->name : '' }}
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </h6>
                                            </a>
                                        </div>
                                        <div id="task_{{ $loop->index }}" class="collapse" role="tabpanel" data-parent="#task_tab" aria-labelledby="task_heading_{{ $loop->index }}" style="">
                                            <div class="p-2">
                                                <div class="row m-0">
                                                    <div class="col-4">{{ __('header.date') }}</div>
                                                    <div class="col-8">
                                                        <h6 class="m-0 font-weight-bold">
                                                            {{ (($task->start_date) ? $task->start_date : '') . ' - ' . ($task->end_date) ? $task->end_date : '' }}
                                                        </h6>
                                                    </div>
                                                    <div class="col-4">{{ __('header.added_by') }}</div>
                                                    <div class="col-8">
                                                        <h6 class="m-0 font-weight-bold">
                                                            {{ ($task->addedBy->first_name) ? $task->addedBy->first_name : '' }}
                                                            {{ ($task->addedBy->last_name) ? $task->addedBy->last_name : '' }}
                                                        </h6>
                                                    </div>
                                                    <div class="col-4">{{ __('header.members') }}</div>
                                                    <div class="col-8">
                                                        @foreach($task->taskUser as $user)
                                                            <span class="btn btn-{{ $theme }} m-0 pt-1 pb-1 pl-2 pr-2">
                                                                {{ ($user->user->first_name) ? $user->user->first_name : '' }}
                                                                {{ ($user->user->last_name) ? $user->user->last_name : '' }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-4">{{ __('header.task_actions') }}</div>
                                                    <div class="col-8">
                                                        <ul class="m-0 p-0">
                                                            @foreach($task->taskAction as $key => $action)
                                                                <li class="list-unstyled">
                                                                    {{ $loop->index + 1 }}:
                                                                    {{ ($action->name) ? $action->name : '' }}
                                                                    {{--                                                                {{ ($action->note) ? (' - ' . $action->note) : '' }}--}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-4">{{ __('header.description') }}</div>
                                                    <div class="col-8">
                                                        <h6 class="m-0 font-weight-bold">
                                                            {{ ($task->description) ? $task->description : '' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
