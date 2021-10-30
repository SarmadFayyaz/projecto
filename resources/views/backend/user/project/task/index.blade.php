<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 70%; left: 15%;">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p class="pb-0 mb-0">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;
                        @php
                            $startTime = Carbon\Carbon::parse($task->start_date);
                            $endTime = Carbon\Carbon::parse($task->end_date);
                            echo   $endTime->diffForHumans($startTime,true).' left';
                        @endphp
                    </p>
                </div>
                <div class="col-6">
                    <h4 class="modal-title text-center font-weight-bold">{{ $task->name }}</h4>
                </div>
                <div class="col-3 text-right">
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="modal-body pt-0">

    <input type="hidden" class="form-control" id="task_id" name="task_id" value="{{ $task->id }}">
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-3">
                    <span class="position-absolute bottom-0">
                        Progress
                    </span>
                </div>
                <div class="col-9">
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <small>{{ (int)$task->progress }}%</small>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-center card pt-2 pb-2 m-0">
                            <div class="progress m-0">
                                <div class="progress-bar bg-{{$theme}}" id="new-blue-bg" role="progressbar" aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ (int)$task->progress }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{--            <p class="pb-0 mb-0" style="font-size:12px;line-height:16px">--}}
            {{--                {{ $task->description }}--}}
            {{--            </p>--}}
        </div>
        <div class="col-md-3">
            <div class="d-flex align-items-center justify-content-end flex-wrap mb-1 mt-3">
                @if(Auth::user()->id != $task->addedBy->id)
                    @if($task->addedBy->deleted_at == null)
                        <span class="bg-light rounded mr-2 position-relative appended_tooltip" rel="tooltip" title="{{ $task->addedBy->first_name . ' ' . $task->addedBy->last_name }}">
                            @if($task->addedBy->image == null)
                                <span class="p-1 rounded-circle bg-{{ $theme }} text-white">
                                    {{ucfirst(isset($task->addedBy->first_name[0]) ? $task->addedBy->first_name[0] : '') . ucfirst(isset($task->addedBy->last_name[0]) ? $task->addedBy->last_name[0] : '')}}
                                </span>
                            @else
                                <img width="25" height="25" class="rounded-circle"
                                     src="{{ Storage::disk('public')->exists($task->addedBy->image) ? Storage::disk('public')->url($task->addedBy->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                            @endif
                            <span class="logged-{{ ($task->addedBy->isOnline()) ? 'in' : 'out' }}">●</span>
                        </span>
                    @else
                        <span class="bg-light rounded mr-2 position-relative appended_tooltip" rel="tooltip" title="{{ __('header.user_deleted') }}">
                            <span class="p-1 rounded-circle bg-{{ $theme }} text-white">
                                <i class="fas fa-user-slash"></i>
                            </span>
                            <span class="logged-out">●</span>
                        </span>
                    @endif
                @endif
                @foreach($task->taskUser as $user)
                    @if(Auth::user()->id != $user->user->id)
                        @if($user->user->deleted_at == null)
                            <span class="bg-light rounded mr-2 position-relative appended_tooltip" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                                @if($user->user->image == null)
                                    <span
                                        class="p-1 rounded-circle bg-{{ $theme }} text-white"> {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}} </span>
                                @else
                                    <img width="25" height="25" class="rounded-circle"
                                         src="{{ Storage::disk('public')->exists($user->user->image) ? Storage::disk('public')->url($user->user->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                @endif
                                <span class="logged-{{ ($user->user->isOnline()) ? 'in' : 'out' }}">●</span>
                            </span>
                        @else
                            <span class="bg-light rounded mr-2 position-relative appended_tooltip" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                <span class="p-1 rounded-circle bg-{{ $theme }} text-white">
                                    <i class="fas fa-user-slash"></i>
                                </span>
                                <span class="logged-out">●</span>
                            </span>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-4 pl-2 pr-2">
            <div class="card mb-0 mt-2">
                <h6 class="text-center m-0 pt-2 pb-2 task_header font-weight-bold"><b> {{ __('header.action') }} </b></h6>
                <div class="card-body p-2 m-0">
                    @foreach($task->taskAction as $action)
                        <p class="w-100 mb-2 pt-2 pb-2 pl-3 pr-3 rounded" style="line-height:16px; display: flex; background:#f5f3f3">
                            <span><b>{{ ($loop->index+1) . '.' }} </b></span>
                            <span class="w-100">
                                {{ $action->name }}
                            </span>
                            @if($task->status == 'approved' || $task->status == 'completed')
                                @if($action->status == 'completed')
                                    <span class="pull-right position-relative">
                                        <a href="javascript:;" class="btn btn-success btn-sm m-0">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </span>
                                @elseif($action->status == 'pending')
                                    <span class="pull-right position-relative">
                                        <a href="{{ route('task-action.edit', $action->id) }}" class="btn btn-sm btn-{{ $theme }} m-0 done_task">
                                            {{ __('header.done') }}
                                        </a>
                                    </span>
                                @endif
                            @endif
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 pl-2 pr-2">
            <div class="card mb-0 mt-2">
                <h6 class="text-center m-0 pt-2 pb-2 task_header font-weight-bold"><b>Action Notes</b></h6>
                <div class="card-body p-2 m-0">
                    <p class="w-100 mb-2 pt-2 pb-2 pl-3 pr-3 rounded" style="line-height:16px; display: flex;">
                        <span><b>1.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam.

                        </span>
                    </p>
                    <p class="w-100 mb-2 pt-2 pb-2 pl-3 pr-3 rounded" style="line-height:16px; display: flex;">
                        <span><b>1.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint.

                        </span>
                    </p>
                    <p class="w-100 mb-2 pt-2 pb-2 pl-3 pr-3 rounded" style="line-height:16px; display: flex;">
                        <span><b>1.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint.

                        </span>
                    </p>
                    <p class="w-100 mb-2 pt-2 pb-2 pl-3 pr-3 rounded" style="line-height:16px; display: flex;">
                        <span><b>1.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint.

                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 pl-2 pr-2">
            <div class="card mb-0 mt-2">
                <h6 class="text-center m-0 pt-2 pb-2 task_header font-weight-bold"><b> {{ __('header.task_notes') }} </b></h6>
                <div class="card-body p-2 m-0 bg-white">
                    @foreach($task->taskNote as $note)
                        <p class="w-100 mb-2 pt-2 pb-2 pl-3 pr-3 rounded" style="line-height:16px; display: flex;">
                            {{ $note->notes }}
                        </p>
                    @endforeach

                </div>
            </div>
        </div>
        @if($task->project->project_leader == Auth::user()->id)
            <div class="col-12 text-right">
                @if($task->status == 'pending')
                    <a href="{{ route('task.edit', $task->id) }}" clas  s="btn btn-success"> {{ __('header.approve') }} </a>
                @elseif($task->progress == 100 && $task->status == 'approved')
                    <a href="{{ route('task.completed', $task->id) }}" class="btn btn-success"> {{ __('header.completed') }} </a>
                @endif
            </div>
        @endif
    </div>

</div>

