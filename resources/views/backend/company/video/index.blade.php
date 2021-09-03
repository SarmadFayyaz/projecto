@extends('layouts.company')

@section('title', __('header.videos'))

@section('style')

@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="item pad15">
                        @foreach($companies as $company)
                        <div id="div{{$company->id}}" class="vide_mirror">
                            <br><br><br><br>
                            <br>
                        </div>
                        <a href="javascript:void(0)" style="color: black;" data-toggle="call_to_user">User {{ $company->id }}</a>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

@endsection

@section('script')

    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>

    <script type="text/javascript">

        var room;
        $(document).on('click', 'a[data-toggle=call_to_user]', function (event) {
            event.preventDefault();
            $.ajax({
                url: APP_URL + "/userCall",
                type: "POST",
                data: {roomName: '_meetingtest', "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    Twilio.Video.createLocalTracks({
                        audio: true,
                        video: {width: 240, zoom: true}
                    }).then(function (localTracks) {
                        return Twilio.Video.connect(result.accessToken, {
                            name: result.roomName,
                            tracks: localTracks,
                            video: {width: 300}
                        });
                    }).then(function (room) {
                        console.log('Successfully joined a Room: ', room.name);
                        window.room = room
                        //local participants
                        var previewContainer = document.getElementById(room.localParticipant.sid);
                        if (!previewContainer || !previewContainer.querySelector('video')) {
                            participantConnected(room.localParticipant);

                            // document.getElementById('media-div').appendChild(div);
                        }

                        //connectected participants
                        room.participants.forEach(participant => {
                            participantConnected(participant)
                        });
                        room.on('participantConnected', function (participant) {
                            console.log("Joining: ");
                            participantConnected(participant);
                        });

                        room.on('participantDisconnected', function (participant) {
                            console.log("Disconnected: ");
                            participantDisconnected(participant);
                        });
                    });
                },
                error: function () {
                    alert('in error');
                }
            });
        });
        function participantConnected(participant) {
            console.log('Participant "%s" connected', participant.identity);

            const div = document.getElementById('div' + participant.identity);
            $('#div'+participant.identity).removeClass('vide_mirror')
            // div.id = participant.sid;
            // div.setAttribute("style", "float: left; margin: 10px;");
            div.innerHTML = "<div style='clear:both'></div>";

            participant.tracks.forEach(function(track) {
                trackAdded(div, track)
            });

            participant.on('trackAdded', function(track) {
                trackAdded(div, track)
            });
            participant.on('trackRemoved', trackRemoved);

            //document.getElementById('media-div').appendChild(div);
        }

        function participantDisconnected(participant) {
            console.log('Participant "%s" disconnected', participant.identity);

            participant.tracks.forEach(trackRemoved);
            alert(participant.identity+' has closed his connection')
            document.getElementById(participant.sid).remove();
        }
        function trackAdded(div, track) {
            div.append(track.attach());
            var video = div.getElementsByTagName("video")[0];
            if (video) {
                video.setAttribute("style", "max-width:220px;");
            }
        }


        function trackRemoved(track) {
            track.detach().forEach( function(element) { element.remove() });
        }
        // screen share
        var screenTrack;
        function shareScreen() {
            event.preventDefault();
            if (!screenTrack) {
                navigator.mediaDevices.getDisplayMedia().then(stream => {
                    screenTrack = new Twilio.Video.LocalVideoTrack(stream.getTracks()[0]);
                    room.localParticipant.publishTrack(screenTrack);
                    screenTrack.mediaStreamTrack.onended = () => { shareScreen() };
                    // screenTrack.dimensions.width(500);
                    console.log(screenTrack)

                    $('#btnScreen').html('<span class="material-icons icon-image-preview">stop_screen_share</span><div class="ripple-container"></div>')
                    $('#btnScreen').attr('title','Stop Screen');
                    $.ajax({
                        url : '/admin/screen-shared',
                        type : 'post',
                        data : {
                            "_token" : " {{ csrf_token()  }} ",
                            'projectID' : "1",
                            {{--'projectID' : "{{$proj->id}}",--}}
                            'status'    : true
                        },
                        dataType: 'json',
                        success : function (result){
                        },
                        error : function (){
                            alert('in error..')
                        }
                    })
                }).catch(() => {
                    alert('Could not share the screen.');
                });
            }
            else {
                room.localParticipant.unpublishTrack(screenTrack);
                screenTrack.stop();
                screenTrack = null
                $('#btnScreen').html('<span class="material-icons icon-image-preview">screen_share</span><div class="ripple-container"></div>')
                $('#btnScreen').attr('title','Share Screen');
                $.ajax({
                    url : '/admin/screen-shared',
                    type : 'post',
                    data : {
                        "_token" : " {{ csrf_token()  }} ",
                        'projectID' : "1",
                        {{--'projectID' : "{{$proj->id}}",--}}
                        'status'    : false
                    },
                    dataType: 'json',
                    success : function (result){
                    },
                    error : function (){
                        alert('in error..')
                    }
                })
            }
        };
        // mute & unmute mic
        function muteMic()
        {
            room.localParticipant.audioTracks.forEach((publication) => {
                if (publication.isEnabled)
                {
                    publication.disable();
                    $('#btnMic').html('<span class="material-icons icon-image-preview">mic_off</span><div class="ripple-container"></div>')
                    $('#btnMic').attr('title','Unmute Mic');
                }
                else{
                    publication.enable();
                    $('#btnMic').html('<span class="material-icons">mic</span><div class="ripple-container"></div>')
                    $('#btnMic').attr('title','Mute Mic');
                }

            });


        }
        function muteVideo()
        {
            if (typeof room === 'undefined') {
                $.ajax({
                    url: "/room/userCall",
                    type: "POST",
                    data: {roomName:'_meetingtest',"_token": "{{ csrf_token() }}"},
                    success: function(result){
                        Twilio.Video.createLocalTracks({
                            audio: true,
                            video: { width: 240,zoom:true }
                        }).then(function(localTracks) {
                            return Twilio.Video.connect(result.accessToken, {
                                name: result.roomName,
                                tracks: localTracks,
                                video: { width: 300 }
                            });
                        }).then(function(room) {
                            console.log('Successfully joined a Room: ', room.name);
                            window.room = room
                            //local participants
                            var previewContainer = document.getElementById(room.localParticipant.sid);
                            if (!previewContainer || !previewContainer.querySelector('video')) {
                                participantConnected(room.localParticipant);
                                // document.getElementById('media-div').appendChild(div);
                            }

                            //connectected participants
                            room.participants.forEach(participant => {
                                participantConnected(participant)
                            });
                            room.on('participantConnected', function(participant) {
                                console.log("Joining: ");
                                participantConnected(participant);
                            });

                            room.on('participantDisconnected', function(participant) {
                                console.log("Disconnected: ");
                                participantDisconnected(participant);
                            });
                        });
                    },
                    error : function (){
                        alert('in error');
                    }
                });
            }
            else{
                room.localParticipant.videoTracks.forEach(publication => {
                    console.log(publication);
                    if (publication.isEnabled)
                    {
                        publication.disable();
                        $('#btnCam').html('<span class="material-icons icon-image-preview">videocam_off</span><div class="ripple-container"></div>')
                        $('#btnCam').attr('title','Turn On Camera');
                    }
                    else{
                        publication.enable();
                        $('#btnCam').html('<span class="material-icons">video_call</span><div class="ripple-container"></div>')
                        $('#btnCam').attr('title','Turn Off Camera');
                    }

                });
            }

        }
        function ChangeVolume()
        {


            $('audio,video').each(function(){
                $(this).volume = 0.0;
            });
            $(this).pause();
        }
        // userNotes
        $('#userNotes_form').submit(function (){
            event.preventDefault();
            var str = '';
            $.ajax({
                url  : $(this).attr('action'),
                type : 'post',
                data : $('#userNotes_form').serialize(),
                dataType: 'json',
                success : function (result)
                {
                    var user = '';
                    $.each(result,function (i,item){
                        if(item.get_user!=null)
                        {
                            var user = '('+item.get_user.name.charAt(0).toUpperCase()+item.get_user.name.substr(1).toLowerCase()+')';
                        }
                        var html = '<span style="text-align: center; font-weight: bold;color: green">'+item.get_task.task_title+' '+user+'</span>\n' +
                            '                                                                    <p style="border-style: groove; padding: 10px 10px 10px 10px;">\n' +
                            '                                                                       '+item.notes+'\n' +
                            '                                                                        <br>\n' +
                            '                                                                        <span style="text-align: center; font-weight: bold;">'+moment(item.created_at).format("YYYY-MM-DD")+'</span></p>';
                        str+=html;
                    });
                    $('#UserNotes').html(str);
                    $('#notes').val('');
                    // var notesBody = document.querySelector('#UserNotes');
                    // notesBody.scrollTop = notesBody.scrollHeight - notesBody.clientHeight;

                },
                error  : function (result)
                {
                    alert('in error');
                }
            })
        })
        // UserNotes by task
        $('#task').on('change',function (){
            event.preventDefault();
            var str = '';
            $.ajax({
                url    : '/admin/task-notes',
                type   : 'POST',
                data   : {
                    "_token": "{{ csrf_token() }}",
                    project :'1',
                    {{--project :'{{$proj->id}}',--}}
                    task    : $(this).val(),
                },
                dataType : 'json',
                success : function (result)
                {
                    $.each(result,function (i,item){
                        var html = '<span style="text-align: center; font-weight: bold;color: green">'+item.get_task.task_title+'</span>\n' +
                            '                                                                    <p style="border-style: groove; padding: 10px 10px 10px 10px;">\n' +
                            '                                                                       '+item.notes+'\n' +
                            '                                                                        <br>\n' +
                            '                                                                        <span style="text-align: center; font-weight: bold;">'+moment(item.created_at).format("YYYY-MM-DD")+'</span></p>';
                        str+=html;
                    });
                    $('#UserNotes').html(str);
                    //$('#notes').val('');
                    // var notesBody = document.querySelector('#UserNotes');
                    // notesBody.scrollTop = notesBody.scrollHeight - notesBody.clientHeight;

                },
                error  : function (result)
                {
                    alert('in error');
                }
            })
        })
        // show task
        $(document).on('click','a[data-toggle=task_details]',function (){
            event.preventDefault();
            $('#show_task_modal').find('.card-title').html($(this).attr('data-task'))
            $('#show_task_modal').find('.modal-body').load($(this).attr('href'))
            $('#show_task_modal').modal('show');
        });
        function Active(id) {
            swal({
                title: 'Are you sure?',
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success ml-1',
                cancelButtonClass: 'btn btn-danger mr-1',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('active-form'+id).submit();
                }
            })
        }
        $('#Attachmentmsg').on('change',function(e){
            var filename =e.target.files[0].name;
            $('#filename').text(filename);
            $('#filename').attr('title',filename);
        })
        $('#Attachmentmsg1').on('change',function(e){
            var filename =e.target.files[0].name;
            $('#filename1').text(filename);
            $('#filename1').attr('title',filename);
        })
        $('#add-task-form').submit(function (){
            $('#creat-task-btn').prop('disabled', true);
        });

        // pre text & images
        $('#pre-files').on('change',function(e){
            alert($("input",this)[0].files.length+" files attached")
            // var filename =e.target.files[0].name;
            // $('#filename').text(filename);
            // $('#filename').attr('title',filename);
        })
        function addField(count){
            var str = '<input type="text" class="form-control" id="text'+(count+1)+'" name="text[]" placeholder="Text"><br>'
            $('#pre-text-area').append(str)
        }
        $('.pre-img').on('click',function (){
            //     event.preventDefault();
            //     $('#show_pre_img').find('#show_img').attr('src',$(this).attr('src'))
            //   $('#show_pre_img').modal('toggle');
            $('.imagepreview').attr('src', $(this).attr('src'));
            $('#imagemodal').css('display','block')
            $('#imagemodal').modal('show');
        })


    </script>
    <script type="text/javascript">
        $(function (){
            $('#image-close').on('click',function (){
                event.preventDefault();
                $('#imagemodal').css('display','none');
            })
        })
        // $(document).on('click','a[data-toggle=open_add_text]',function (){
        //     event.preventDefault();
        //
        //     $('#show_free_text').modal('toggle');
        //     $('#add_new_pre_text').modal('show');
        // })
        $(document).on('click','a[data-toggle=show_text_modal]',function (){
            event.preventDefault();
            $('#show_free_text').find('.modal-content').load($(this).attr('href'));
            $('#show_free_text').modal('show');
        });
        // submit a form
    </script>
@endsection
