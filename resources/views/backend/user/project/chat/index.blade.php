<!-- chat box -->
<div class="chat-popup" id="chatPopupModal" style="border-radius:10px ; min-width: 22vw;max-width: 22vw;">
    <div class="ml-auto mr-auto rounded p-2 bg-white">
        <div class="row">
            <div class="col-10 text-right">
                <select class="selectpicker" id="chat_type" data-style="select-with-transition" data-size="4" data-width="100%" title="{{ __('header.group_chat') }}">
                    <option selected value="0"> {{ __('header.group_chat') }} </option>
                    @if(Auth::user()->id != $project->project_leader)
                        <option value="{{ $project->projectLeader->id }}">
                            @if($project->projectLeader->deleted_at == null)
                                {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                            @else
                                {{ __('header.user_deleted') }}
                            @endif
                        </option>
                    @endif
                    @foreach($project->projectUser as $project_user)
                        @if(Auth::user()->id != $project_user->user->id)
                            <option value="{{ $project_user->user->id }}">
                                @if($project_user->user->deleted_at == null)
                                    {{ $project_user->user->first_name . ' ' . $project_user->user->last_name }}
                                @else
                                    {{ __('header.user_deleted') }}
                                @endif
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-2 text-center">
                <a href="javascript:void(0)" class="text-dark" onclick="closeChat()"><i class="fa fa-times pt-2"></i></a>
            </div>
        </div>
        <div class="col-12 table-responsive" id="chat_body" style="max-height: 35vh;min-height: 35vh;">
            @foreach($project->groupConversation as $conversation)
                @if($conversation->message_type == 0)
                    <div class="row mb-2">
                        @if($conversation->user->deleted_at == null)
                            @if($conversation->user->image == null)
                                <div class="col-2 mt-2 p-1 {{ (Auth::user()->id == $conversation->user_id) ? 'order-10' : '' }}">
                                    <span class="p-2 rounded-circle bg-info">
                                        {{ucfirst(isset($conversation->user->first_name[0]) ? $conversation->user->first_name[0] : '') . ucfirst(isset($conversation->user->last_name[0]) ? $conversation->user->last_name[0] : '')}}
                                    </span>
                                </div>
                            @else
                                <div class="col-2 p-1 {{ (Auth::user()->id == $conversation->user_id) ? 'order-10' : '' }}">
                                    <img width="40" height="40" class="rounded-circle"
                                         src="{{ Storage::disk('public')->exists($conversation->user->image) ? Storage::disk('public')->url($conversation->user->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                </div>
                            @endif
                        @else
                            <div class="col-2 mt-2 p-1">
                                <span class="p-2 rounded-circle bg-info">
                                    <i class="fas fa-user-slash"></i>
                                </span>
                            </div>
                        @endif
                        <div class="col-10 {{ (Auth::user()->id == $conversation->user_id) ? 'order-2' : '' }}" style="background: #eeeeee;border-radius: 10px; ">
                            <p class="mb-0 pb-0">
                                <span style="font-size: 14px;">
                                    <b>
                                        @if($conversation->user && $conversation->user->deleted_at == null)
                                            {{ $conversation->user->first_name . ' ' . $conversation->user->last_name }}
                                        @else
                                            {{ __('header.user_deleted') }}
                                        @endif
                                    </b>
                                </span>
                                <span class="text-lowercase" style="float:right;font-size: 14px;"><b>{{ getTime($conversation->created_at) }}</b></span>
                            </p>
                            <p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">
                                {{ ($conversation->message) ? $conversation->message : '' }}
                                @if($conversation->document_id != '' && $conversation->document_id != null )
                                    @if($conversation->message)
                                        <br>
                                    @endif
                                    <a href="{{Storage::disk('public')->exists($conversation->document->file) ? Storage::disk('public')->url($conversation->document->file) : '#' }}" target="_blank" rel="tooltip"
                                       title="{{ $conversation->document->name }}" class="btn btn-link bg-transparent text-dark p-1 mt-0 mb-0 0 ml-0 mr-0 w-auto">
                                        {!! getIcon($conversation->document->type) !!}
                                    </a>
                            @endif
                            <p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-12 table-responsive" id="individual_chat_body" style="max-height: 35vh;min-height: 35vh; display: none;"></div>

        <div class="box-footer">
            <form id="chat_form" class="mb-0" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="message_type" value="0" name="message_type">
                <input type="hidden" class="project_id" value="{{$project->id}}" name="project_id">
                <input type="hidden" class="receiver_id" value="0" name="receiver_id">
                <div class="input-group" style="border: 1px solid #bbb2b2; border-radius: 10px;padding:3px;background: #eeeeee;">
                    <input type="text" name="message" id="chat_message" placeholder="{{__('header.write_something_interesting')}}" class="form-control" style="background-image:none;">
                    <div class="input-group-append">
                        <span class="input-group-text p-1">
                            <label for="chat_file" rel="tooltip" title="Attach file" class="m-0">
                                <span class="cursor-pointer"><i class="fas fa-paperclip text-dark" style="font-size: 17px"></i>
                                    <input type="file" id="chat_file" name="file" style="display:none">
                                </span>
                            </label>
                        </span>
                        <span class="input-group-text p-1">
                            <button class="text-dark btn-link btn bg-transparent p-0 m-0" id="chat_btn" type="submit"><i class="fa fa-send m-0"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- binnecle box -->
<div class="chat-popup" id="binancePopupModal" style="border-radius:10px; min-width: 22vw;max-width: 22vw;">
    <div class="ml-auto mr-auto rounded p-2 bg-white">
        <div class="row">
            <div class="col-10 text-left">
                <h5><b>{{ __('header.binnacle') }}</b></h5>
            </div>
            <div class="col-2 text-center">
                <a href="javascript:void(0)" class="text-dark" onclick="closeBinance()"><i class="fa fa-times pt-2"></i></a>
            </div>
        </div>
        <div class="col-12 table-responsive" id="binance_body" style="max-height: 35vh;min-height: 35vh;">
            @foreach($project->groupConversation as $conversation)
                @if($conversation->message_type == 1)
                    <div class="row mb-2">
                        @if($conversation->user->deleted_at == null)
                            @if($conversation->user->image == null)
                                <div class="col-2 mt-2 p-1 {{ (Auth::user()->id == $conversation->user_id) ? 'order-10' : '' }}">
                                    <span class="p-2 rounded-circle bg-info">
                                        {{ucfirst(isset($conversation->user->first_name[0]) ? $conversation->user->first_name[0] : '') . ucfirst(isset($conversation->user->last_name[0]) ? $conversation->user->last_name[0] : '')}}
                                    </span>
                                </div>
                            @else
                                <div class="col-2 p-1 {{ (Auth::user()->id == $conversation->user_id) ? 'order-10' : '' }}">
                                    <img width="40" height="40" class="rounded-circle"
                                         src="{{ Storage::disk('public')->exists($conversation->user->image) ? Storage::disk('public')->url($conversation->user->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                </div>
                            @endif
                        @else
                            <div class="col-2 mt-2 p-1">
                                <span class="p-2 rounded-circle bg-info">
                                    <i class="fas fa-user-slash"></i>
                                </span>
                            </div>
                        @endif
                        <div class="col-10 {{ (Auth::user()->id == $conversation->user_id) ? 'order-2' : '' }}" style="background: #eeeeee;border-radius: 10px; ">
                            <p class="mb-0 pb-0">
                                <span style="font-size: 14px;">
                                    <b>
                                        @if($conversation->user && $conversation->user->deleted_at == null)
                                            {{ $conversation->user->first_name . ' ' . $conversation->user->last_name }}
                                        @else
                                            {{ __('header.user_deleted') }}
                                        @endif
                                    </b>
                                </span>
                                <span class="text-lowercase" style="float:right;font-size: 14px;"><b>{{ getTime($conversation->created_at) }}</b></span>
                            </p>
                            <p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">
                                {{ ($conversation->message) ? $conversation->message : '' }}
                                @if($conversation->document_id != '' && $conversation->document_id != null )
                                    @if($conversation->message)
                                        <br>
                                    @endif
                                    <a href="{{Storage::disk('public')->exists($conversation->document->file) ? Storage::disk('public')->url($conversation->document->file) : '#' }}" target="_blank" rel="tooltip"
                                       title="{{ $conversation->document->name }}" class="btn btn-link bg-transparent text-dark p-1 mt-0 mb-0 0 ml-0 mr-0 w-auto">
                                        {!! getIcon($conversation->document->type) !!}
                                    </a>
                            @endif
                            <p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="box-footer">
            <form id="binance_form" class="mb-2" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="message_type" value="1" name="message_type">
                <input type="hidden" class="project_id" value="{{$project->id}}" name="project_id">
                <input type="hidden" class="receiver_id" value="0" name="receiver_id">
                <div class="input-group" style="border: 1px solid #bbb2b2; border-radius: 10px;padding:3px;background: #eeeeee;">
                    <input type="text" name="message" id="binance_message" placeholder="{{__('header.write_something_interesting')}}" class="form-control" style="background-image:none;">
                    <div class="input-group-append">
                        <span class="input-group-text p-1">
                            <label for="binance_file" rel="tooltip" title="Attach file" class="m-0">
                                <span class="cursor-pointer"><i class="fas fa-paperclip text-dark" style="font-size: 17px"></i>
                                    <input type="file" id="binance_file" name="file" style="display:none">
                                </span>
                            </label>
                        </span>
                        <span class="input-group-text p-1">
                            <button class="text-dark btn-link btn bg-transparent p-0 m-0" id="binance_btn" type="submit"><i class="fa fa-send m-0"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

