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
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <span class="pull-left">
                                {{ __('header.progress') }}
                            </span>
                            <small>{{ (int)$task->progress }}%</small>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-center pl-2 pr-2">
                            <div class="card p-2 m-0">
                                <div class="progress m-0">
                                    <div class="progress-bar bg-{{$theme}}" id="new-blue-bg" role="progressbar" aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100"
                                         style="width:{{ (int)$task->progress }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <p class="pb-0 mb-0" style="font-size:12px;line-height:16px">
                {{ $task->description }}
            </p>
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
                            <span class="online_status_{{ $task->addedBy->id }} logged-{{ ($task->addedBy->isOnline()) ? 'in' : 'out' }}">●</span>
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
                                <span class="online_status_{{ $user->user->id }} logged-{{ ($user->user->isOnline()) ? 'in' : 'out' }}">●</span>
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
                    @foreach($task->taskAction as $action)
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ ($loop->index+1) . '.' }}</span>
                            </div>
                            <textarea rows="1" class="form-control {{ ($loop->last && !$loop->first) ? '' : 'mb-3' }} action_note" data-id="{{ $action->id }}">{{ $action->note }}</textarea>
                        </div>
                    @endforeach
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
    </div>

</div>

