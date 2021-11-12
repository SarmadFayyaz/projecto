<script>
    function userSetting() {
        let background = $('.active-color').find('.active').data('color');
        let sidebar_background = $('.background-color').find('.active').data('background-color');
        let sidebar_size = 0;
        if ($('.switch-sidebar-mini input').is(':checked'))
            sidebar_size = 1;
        $.ajax({
            url: APP_URL + "/admin/setting",
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
</script>
