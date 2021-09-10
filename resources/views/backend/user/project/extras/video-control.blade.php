
@push('desk-video-control')
    <div class="collapse navbar-collapse justify-content-end d-none d-md-block d-lg-block d-xl-block">
        <div class="navbar-btn">
            <button class="btn btn-primary btn-sm btn-round mr-md-4">Platform Information</button>
        </div>
        <div class="navbar-nav-btns">
            <button class="btn btn-primary btn-sm mr-md-1" title="Mute Mic"><i class="fas fa-microphone text-white"></i></button>
            <button class="btn btn-primary btn-sm mr-md-1" title="Turn Off Camera"><i class="fas fa-video text-white"></i></button>
            <button class="btn btn-primary btn-sm mr-md-1" title="Share Screen"><i class="fab fa-slideshare text-white"></i></button>
            <button class="btn btn-primary btn-sm mr-md-1"><i class="fas fa-volume-up text-white"></i>
            </button>
        </div>
    </div>
@endpush
@push('mob-video-control')
    <div class="navbar-btn d-none d-sm-block d-md-none d-lg-none d-xl-none">
        <button class="btn btn-primary btn-sm btn-round mr-md-1 ">Platform Information</button>
    </div>

    <div class="navbar-nav-btns d-none d-sm-block d-md-none d-lg-none d-xl-none">
        <button class="btn btn-primary btn-sm mr-md-1 " title="Mute Mic"><i class="fas fa-microphone text-white"></i></button>
        <button class="btn btn-primary btn-sm mr-md-1" title="Turn Off Camera"><i class="fas fa-video text-white"></i></button>
        <button class="btn btn-primary btn-sm mr-md-1" title="Share Screen"><i class="fab fa-slideshare text-white"></i></button>
        <button class="btn btn-primary btn-sm mr-md-1"><i class="fas fa-volume-up text-white"></i>
        </button>

    </div>
@endpush
@push('meeting-general')
    <ul class="nav nav-pills nav-pills-warning ulitm" role="tablist" hidden>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" id="meeting" href="#link2" role="tablist"> <i class="material-icons" style="padding:0px;font-size:22px">videocam</i><br> Meeting </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active show" id="general" data-toggle="tab" href="#link1" role="tablist"> <i class="material-icons" style="padding:0px;font-size:22px">supervisor_account</i><br> General </a>
        </li>
    </ul>
@endpush
