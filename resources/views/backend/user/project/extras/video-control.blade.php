
@push('desk-video-control')
    <div class="collapse navbar-collapse justify-content-end d-none d-md-block d-lg-block d-xl-block">
        <div class="navbar-btn">
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project->id) }}" class="project_details btn p-0 bg-transparent btn-link">
                <i class="fas fa-info-circle text-warning cursor-pointer" rel="tooltip" title="{{ __('header.view_project_details') }}" style="font-size: 1.624vw;"></i>
            </a>
            <button class="btn btn-{{ $theme }} btn-sm mr-md-2" data-toggle="modal" data-target="#platformInformationModal">
                {{ __('header.platform_information') }}
            </button>
        </div>
        <div class="navbar-nav-btns">
            <button class="btn btn-{{ $theme }} btn-sm mr-md-1 btnMic" rel="tooltip" title="{{ __('header.mute_mic') }}" onclick="mic()"><i class="fas fa-microphone text-white"></i></button>
            <button class="btn btn-{{ $theme }} btn-sm mr-md-1 btnCam" rel="tooltip" title="{{ __('header.turn_off_camera') }}" onclick="camera()"><i class="fas fa-video text-white"></i></button>
            <button class="btn btn-{{ $theme }} btn-sm mr-md-1 btnScreen" rel="tooltip" title="{{ __('header.share_screen') }}" onclick="shareScreen()"><i class="fab fa-slideshare text-white"></i></button>
{{--            <button class="btn btn-{{ $theme }} btn-sm mr-md-1" onclick="ChangeVolume()"><i class="fas fa-volume-up text-white"></i>--}}
{{--            </button>--}}
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} btn-sm call_to_user">
                {{ __('header.join_call') }}
            </a>
        </div>
    </div>
@endpush
@push('mob-video-control')
    <div class="navbar-btn d-none d-sm-block d-md-none d-lg-none d-xl-none">
        <a href="javascript:void(0)" data-url="{{ route('project.show', $project->id) }}" class="project_details btn p-0 bg-transparent btn-link">
            <i class="fas fa-info-circle text-warning cursor-pointer" rel="tooltip" title="{{ __('header.view_project_details') }}" style="font-size: 1.624vw;"></i>
        </a>
        <button class="btn btn-{{ $theme }} btn-sm mr-md-1 " data-toggle="modal" data-target="#platformInformationModal">
            {{ __('header.platform_information') }}
        </button>
    </div>

    <div class="navbar-nav-btns d-none d-sm-block d-md-none d-lg-none d-xl-none">
        <button class="btn btn-{{ $theme }} btn-sm mr-md-1 btnMic" rel="tooltip" title="{{ __('header.mute_mic') }}" onclick="mic()"><i class="fas fa-microphone text-white"></i></button>
        <button class="btn btn-{{ $theme }} btn-sm mr-md-1 btnCam" rel="tooltip" title="{{ __('header.turn_off_camera') }}" onclick="camera()"><i class="fas fa-video text-white"></i></button>
        <button class="btn btn-{{ $theme }} btn-sm mr-md-1 btnScreen" rel="tooltip" title="{{ __('header.share_screen') }}" onclick="shareScreen()"><i class="fab fa-slideshare text-white"></i></button>
{{--        <button class="btn btn-{{ $theme }} btn-sm mr-md-1"><i class="fas fa-volume-up text-white"></i>--}}
{{--        </button>--}}
        <a href="javascript:void(0)" class="btn btn-{{ $theme }} btn-sm call_to_user">
            {{ __('header.join_call') }}
        </a>
    </div>
@endpush
@push('meeting-general')
    <ul class="nav nav-pills nav-pills-{{ $theme }} ulitm" role="tablist" hidden>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" id="meeting" href="#link2" role="tablist"> <i class="material-icons" style="padding:0px;font-size:22px">videocam</i><br> {{ __('header.meeting') }} </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active show" id="general" data-toggle="tab" href="#link1" role="tablist"> <i class="material-icons" style="padding:0px;font-size:22px">supervisor_account</i><br> {{ __('header.general') }} </a>
        </li>
    </ul>
@endpush
