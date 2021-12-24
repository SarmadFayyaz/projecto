@foreach($tasks as $task)
    @if($task->status == 'completed')
        <div class="col-6">
            @endif
            <div class="bg-light p-2 mb-3 {{($task->status == 'pending') ? 'bg-pending' : ''}} {{($task->status == 'pending_completion') ? 'bg-pending-completion' : ''}} {{ (auth()->user()->id == $task->added_by) ? '' : 'other_tasks' }}">
                <!-- <h6 class="h6css" >Lorem</h6> -->
                <a class="task_details" href="{{ route('task.show',$task->id) }}" data-id="{{ $task->id }}">
                    <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                        <span class="bg-light rounded mr-1 p-1 h6css mr-auto text-dark" title="{{{ __('header.task_name') }}}"><b>{{ $task->name  }}</b></span>
                        @php $counter = 0; @endphp
                        @if(Auth::user()->id != $task->addedBy->id)
                            @php $counter++; @endphp
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
                                @php $counter++; @endphp
                                @if($user->user->deleted_at == null)
                                    @if($counter <= 3)
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
                                    @endif
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
                        @if($counter > 3)
                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                        @endif
                    </div>
                </a>

                <div class="card pl-2 pr-2 pt-1 pb-1 m-0 rounded bg-light appended_tooltip" rel="tooltip" title="{{ __('header.progress') }} {{ (int)$task->progress }}%">
                    <div class="progress m-0">
                        <div class="progress-bar bg-{{ $theme }}" role="progressbar" style="width: {{ (int)$task->progress }}%" aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-2">
                    <span class="fs-12">{{ __('header.actions') }}</span>
                    <span class="fs-12">
                        @if($task->taskAction!=null && $task->taskAction->count()>0)
                            {{$task->taskAction->where('status','completed')->count()}}
                            / {{$task->taskAction->count()}}
                        @else 0/0
                        @endif
                    </span>
                    <span class="fs-12"><i class="fas fa-clock"></i>
                        @if($task->status == 'completed')
                            {{ __('header.completed') }}
                            @else
                        @php
                            $startTime = Carbon\Carbon::parse($task->start_date);
                            $endTime = Carbon\Carbon::parse($task->end_date);
                            echo   $endTime->diffForHumans($startTime,true).' ' . __('header.left');
                        @endphp
                            @endif
                    </span>
                </div>

            </div>
            @if($task->status == 'completed')
        </div>
    @endif
@endforeach
