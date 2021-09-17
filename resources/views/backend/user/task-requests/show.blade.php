<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-primary p-2" style="    width: 70%; left: 15%;">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p class="pb-0 mb-0">
                        <i class="fa fa-clock-o" aria-hidden="true" style="font-size: 20px;margin-top: -20px;"></i>&nbsp;
                        @php
                            $startTime = Carbon\Carbon::parse($task->start_date);
                            $endTime = Carbon\Carbon::parse($task->end_date);
                            echo   $endTime->diffForHumans($startTime,true).' left';
                        @endphp
                    </p>
                </div>
                <div class="col-6">
                    <h4 class="modal-title text-center ">{{ $task->name }}</h4>
                </div>
                <div class="col-3 text-right">
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="modal-body">

    <input type="hidden" class="form-control" id="task_id" name="task_id" value="{{ $task->id }}">
    <div class="row">
        <div class="col-md-2">
            <p>
                Progress: <small>{{ (int)$task->progress }}%</small>
            </p>
            <div class="progress">
                <div class="progress-bar bg-success" id="new-blue-bg" role="progressbar" aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ (int)$task->progress }}%"></div>
            </div>
        </div>
        <div class="col-md-7">
            <p class="pb-0 mb-0" style="font-size:12px;line-height:16px">
                {{ $task->description }}
            </p>
        </div>
        <div class="col-md-3">
            <div class="d-flex align-items-center justify-content-end flex-wrap mb-1">
                @if(Auth::user()->id != $task->addedBy->id)
                    <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ $task->addedBy->first_name . ' ' . $task->addedBy->last_name }}">
                        @if($task->addedBy->image == null)
                            <span class="p-1 rounded-circle bg-info">
                                {{ucfirst(isset($task->addedBy->first_name[0]) ? $task->addedBy->first_name[0] : '') . ucfirst(isset($task->addedBy->last_name[0]) ? $task->addedBy->last_name[0] : '')}}
                            </span>
                        @else
                            <img width="25" height="25" class="rounded-circle" src="{{ Storage::disk('public')->exists($task->addedBy->image) ? Storage::disk('public')->url($task->addedBy->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                        @endif
                        <span class="logged-in">●</span>
                    </span>
                @endif
                @foreach($task->taskUser as $user)
                    @if(Auth::user()->id != $user->user->id)
                        <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                            @if($user->user->image == null)
                                <span class="p-1 rounded-circle bg-info"> {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}} </span>
                            @else
                                <img width="25" height="25" class="rounded-circle" src="{{ Storage::disk('public')->exists($user->user->image) ? Storage::disk('public')->url($user->user->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                            @endif
                            <span class="logged-in">●</span>
                        </span>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <h4 class="text-center"><b> {{ __('header.action') }} </b></h4>
            <div class="card m-0 p-0" style="background:#f5f3f3">
                <div class="card-body p-2 m-0">
                    @foreach($task->taskAction as $action)
                        <p class="w-100 mb-2" style="line-height:16px; display: flex">
                            <span><b>{{ ($loop->index+1) . '.' }} </b></span>
                            <span class="w-100">
                                {{ $action->name }}
                            </span>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="text-center"><b>Action Notes</b></h4>
            <div class="card m-0 p-0" style="background:#f5f3f3">
                <div class="card-body p-2 m-0">
                    <p class="bg-white pl-2 pr-2" style="line-height:16px">
                        <span><b>1.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                        </span>
                    </p>
                    <p class="bg-white pl-2 pr-2" style="line-height:16px">
                        <span><b>2.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                        </span>
                    </p>
                    <p class="bg-white pl-2 pr-2" style="line-height:16px">
                        <span><b>3.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                        </span>
                    </p>
                    <p class="bg-white pl-2 pr-2" style="line-height:16px">
                        <span><b>4.</b></span>
                        <span class=""> Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="text-center"><b> {{ __('header.task_notes') }} </b></h4>
            <div class="card m-0 p-0" style="background:#f5f3f3">
                <div class="card-body p-2 m-0 bg-white">
                    @foreach($task->taskNote as $note)
                        <p class="" style="line-height:16px">
                            {{ $note->notes }}
                        </p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>

