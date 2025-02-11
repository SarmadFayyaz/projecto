<script>
    $(document).ready(function () {
        update_member_status();
    });

    function userSetting() {
        let background = $('.active-color').find('.active').data('color');
        let sidebar_background = $('.background-color').find('.active').data('background-color');
        let sidebar_size = 0;
        if ($('.switch-sidebar-mini input').is(':checked'))
            sidebar_size = 1;
        $.ajax({
            url: APP_URL + "/setting",
            type: 'post',
            data: {
                background: background,
                sidebar_background: sidebar_background,
                sidebar_size: sidebar_size,
                _token: '{{ csrf_token() }}'
            },
            success: function (result) {
                location.reload();
            },
            error: function (result) {
            }
        });
    }

    Pusher.logToConsole = true;
    var pusher = new Pusher('452e3e06689718ba121f', {
        cluster: 'ap2',
        useTLS: true
    });
    var channel = pusher.subscribe('my-channel.{{Auth::user()->id}}');
    channel.bind('ProjectNotification', function (data) {
        getNotificationText(data.notification.id);
    });
    channel.bind('TaskNotification', function (data) {
        getNotificationText(data.notification.id);
    });
    channel.bind('TaskActionNotification', function (data) {
        getNotificationText(data.notification.id);
    });

    var presence = new Pusher("452e3e06689718ba121f", {
        cluster: 'ap2',
        useTLS: true,
        authEndpoint: APP_URL + "/presence/auth",
        auth: {headers: {"X-CSRF-Token": "{{ csrf_token() }}"}},
    });
    var presenceChannel = presence.subscribe('presence-channel.{{Auth::user()->company_id}}');
    var present_member = new Array();
    presenceChannel.bind("pusher:subscription_succeeded", (members) => {
        update_member_count(members.count);
        members.each((member) => {
            add_member(member.id);
        });
    });
    presenceChannel.bind("pusher:member_added", (member) => {
        add_member(member.id);
    });
    presenceChannel.bind("pusher:member_removed", (member) => {
        remove_member(member.id);
    });

    function add_member(id) {
        if (!present_member.includes(id))
            present_member.push(id);
        $('.online_status_' + id).removeClass('logged-out').addClass('logged-in');
    }

    function remove_member(id) {
        let index = present_member.indexOf(id);
        if (index > -1)
            present_member.splice(index, 1);
        $('.online_status_' + id).removeClass('logged-in').addClass('logged-out');
    }

    function update_member_count(count) {
        // console.log('count-' + count);
    }

    function update_member_status() {
        for (let i = 0; i < present_member.length; i++) {
            add_member(present_member[i]);
        }
    }

    {{--var private = new Pusher("452e3e06689718ba121f", {--}}
    {{--    cluster: 'ap2',--}}
    {{--    useTLS: true,--}}
    {{--    authEndpoint: APP_URL + "/private/auth",--}}
    {{--    auth: { headers: { "X-CSRF-Token": "{{ csrf_token() }}" } },--}}
    {{--});--}}
    {{--var privateChannel = private.subscribe('private-my-channel.{{Auth::user()->id}}');--}}
    {{--privateChannel.bind('OnlineStatus', function (data) {--}}
    {{--    console.log(data);--}}
    {{--    $('.online_status_' + data.user_id).removeClass('logged-out').addClass('logged-in');--}}
    {{--});--}}

    function getProjectBackground(color) {
        if (color == 'green')
            return '#28a745';
        else if (color == 'yellow')
            return '#ffc107';
        else if (color == 'blue')
            return '#007bff';
        else if (color == 'gray')
            return '#6c757d';
        else if (color == 'red')
            return '#dc3545';
        else if (color == 'dark')
            return '#343a40';
        else
            return '#36baaf';
    }

    function getNotificationText(id) {
        $.ajax({
            url: APP_URL + "/notification/" + id,
            type: 'GET',
            success: function (result) {
                toastr.info(result.notification_text);
                var str = ' <a class="dropdown-item" href="' + APP_URL + '/notification/' + id + '/edit"> <span class="mr-2">●</span>' + result.notification_text + '</a>';
                $('#my_notifications').prepend(str);
                var notification_counter = parseInt($('#notification_counter').text());
                $('#notification_counter').html(notification_counter + 1);
            },
            error: function (result) {
                return result.error;
            }
        });
    }
</script>
