<?php

use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getProjects')) {
    function getUserProjects() {
        $data = Project::with('projectUser.user', 'task')->orderBy('created_at', 'asc');
        if (Auth::user()->hasRole('Boss'))
            $data->where('project_leader', Auth::user()->id);
        if (Auth::user()->hasRole('User'))
            $data->whereHas('projectUser', function ($query) {
                $query->whereUserId(Auth::user()->id);
            });
        $user_projects = $data->get();
        //        $data = ProjectUser::orderBy('created_at', 'asc');
        //        if (Auth::user()->hasRole('Boss'))
        //            $data->with(['project' => function($query) {
        //                $query->whereProjectLeader(Auth::user()->id);
        //            }]);
        //        if (Auth::user()->hasRole('User'))
        //            $data->with('project')->where('user_id', Auth::user()->id);
        //        $user_projects = $data->get();
        return $user_projects;
    }
}
if (!function_exists('getProjectBackground')) {
    function getProjectBackground($color) {
        if ($color == 'green')
            return '#28a745';
        else if ($color == 'yellow')
            return '#ffc107';
        else if ($color == 'blue')
            return '#007bff';
        else if ($color == 'gray')
            return '#6c757d';
        else if ($color == 'red')
            return '#dc3545';
        else if ($color == 'dark')
            return '#343a40';
        else
            return $color;
    }
}
if (!function_exists('getTime')) {
    function getTime($date_time) {
        // create a $dt object with the America/Denver timezone
        $dt = new DateTime($date_time, new DateTimeZone('UTC'));

        // change the timezone of the object without changing it's time
        $dt->setTimezone(new DateTimeZone('Asia/Karachi'));

        // format the datetime
        return $dt->format('h:i a');
    }
}
if (!function_exists('getIcon')) {
    function getIcon($type) {
        $icon = '';
        switch ($type) {
            case 'docx':
                $icon = '<i class="far fa-file-word" style="font-size: 50px;"></i>';
                break;
            case 'pdf' :
                $icon = '<i class="far fa-file-pdf" style="font-size: 50px;"></i>';
                break;
            default :
                $icon = '<i class="far fa-file" style="font-size: 50px;"></i>';
                break;
        }
        return $icon;
    }
}
