{{--<!--  Completed Task Modal -->--}}
<div class="modal fade" id="completedTaskModal" tab index="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title">{{ __('header.completed_tasks') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                </div>
            </div>

            <div class="modal-body card-body scroll-bar">
                <div class="row">@foreach($project->task as $task)
                        @if($task->progress == 100 || $task->status == 'completed')
                            <div class="col-md-4">
                                <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                    <!-- <h6 class="h6css" >Lorem</h6> -->
                                    <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                            <span class="bg-light rounded mr-1 p-1 h6css mr-auto" title="lorem"><b>{{ $task->name  }}</b></span>
                                            @php $counter = 0; @endphp
                                            @if(Auth::user()->id != $task->addedBy->id)
                                                @php $counter++; @endphp
                                                <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ $task->addedBy->first_name . ' ' . $task->addedBy->last_name }}">
                                                    @if($task->addedBy->image == null)
                                                        <span class="p-1 rounded-circle bg-info">
                                                            {{ucfirst(isset($task->addedBy->first_name[0]) ? $task->addedBy->first_name[0] : '') . ucfirst(isset($task->addedBy->last_name[0]) ? $task->addedBy->last_name[0] : '')}}
                                                        </span>
                                                    @else
                                                        <img width="25" height="25" class="rounded-circle"
                                                             src="{{ Storage::disk('public')->exists($task->addedBy->image) ? Storage::disk('public')->url($task->addedBy->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                    @endif
                                                    <span class="logged-in">●</span>
                                                </span>
                                            @endif
                                            @foreach($task->taskUser as $user)
                                                @if(Auth::user()->id != $user->user->id)
                                                    @php $counter++; @endphp
                                                    @if($counter <= 3)
                                                        <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                                                            @if($user->user->image == null)
                                                                <span
                                                                    class="p-1 rounded-circle bg-info"> {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}} </span>
                                                            @else
                                                                <img width="25" height="25" class="rounded-circle"
                                                                     src="{{ Storage::disk('public')->exists($user->user->image) ? Storage::disk('public')->url($user->user->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                            @endif
                                                            <span class="logged-in">●</span>
                                                        </span>
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($counter > 3)
                                                <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                            @endif
                                        </div>
                                    </a>

                                    <div class="card p-0 pt-1 m-0 rounded-0" rel="tooltip" title="Progress {{ (int)$task->progress }}%">
                                        <div class="progress mb-1">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ (int)$task->progress }}%" aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span>Actions</span>
                                        <span>
                                            @if($task->taskAction!=null && $task->taskAction->count()>0)
                                                {{$task->taskAction->where('status','completed')->count()}}
                                                / {{$task->taskAction->count()}}
                                            @else 0/0
                                            @endif
                                        </span>
                                        <span><i class="fas fa-clock"></i>
                                            @php
                                                $startTime = Carbon\Carbon::parse($task->start_date);
                                                $endTime = Carbon\Carbon::parse($task->end_date);
                                                echo   $endTime->diffForHumans($startTime,true).' left';
                                            @endphp
                                        </span>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>{{--<!--  End Modal -->--}}

