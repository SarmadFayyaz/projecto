<?php

use App\Models\Project;
use App\Models\WorkRule;
use App\Models\ProjectUser;
use App\Models\Notification;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getProjects')) {
    function getUserProjects() {
        $data = Project::with('projectUser.user', 'task', 'event.eventUser')->orderBy('created_at', 'asc');
        if (Auth::user()->hasRole('Boss'))
            $data->where('project_leader', Auth::user()->id);
        if (Auth::user()->hasRole('User'))
            $data->whereHas('projectUser', function ($query) {
                $query->whereUserId(Auth::user()->id);
            });
        $user_projects = $data->where('status', 0)->get();
        return $user_projects;
    }
}

if (!function_exists('getNotifications')) {
    function getNotifications() {
        $notifications_user = NotificationUser::with('notification')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')->take(10)->get();
        return $notifications_user;
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
if (!function_exists('getSidebarColor')) {
    function getSidebarColor($color) {
        if ($color == 'primary')
            return 'purple';
        else if ($color == 'info')
            return 'azure';
        else if ($color == 'success')
            return 'green';
        else if ($color == 'warning')
            return 'orange';
        else
            return $color;
    }
}
if (!function_exists('getThemeColor')) {
    function getThemeColor($color) {
        if ($color == 'primary')
            return '36baaf';
        else if ($color == 'info')
            return '00bcd4 ';
        else if ($color == 'success')
            return '4caf50';
        else if ($color == 'warning')
            return 'ff9800';
        else if ($color == 'danger')
            return 'f44336';
        else if ($color == 'rose')
            return 'e91e63';
        else
            return '36baaf';
    }
}
if (!function_exists('getDay')) {
    function getDay($day) {
        if ($day == 0)
            return 'Sunday';
        else if ($day == 1)
            return 'Monday ';
        else if ($day == 2)
            return 'Tuesday';
        else if ($day == 3)
            return 'Wednesday';
        else if ($day == 4)
            return 'Thursday';
        else if ($day == 5)
            return 'Friday';
        else if ($day == 6)
            return 'Saturday';
        else
            return 'Day';
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


if (!function_exists('getFormType')) {
    function getFormType($type) {
        if ($type == 1) {
            return 'Initial Meeting';
        } elseif ($type == 2) {
            return 'Work Rules';
        } elseif ($type == 3) {
            return 'Description of Meeting';
        } elseif ($type == 4) {
            return 'Facilitator';
        } else {
            return 'Type';
        }
    }
}

if (!function_exists('getNotificationText')) {
    function getNotificationText($id) {
        $notification = Notification::with('project', 'task', 'user')->where('id', $id)->first();
        if ($notification->type == 'project added')
            return __('header.project_added', ['project_name' => $notification->project->name]);
        else if ($notification->type == 'task added')
            return __('header.task_added',
                ['project_name' => $notification->project->name,
                    'user_name' => $notification->user->first_name . ' ' . $notification->user->last_name]);
        else if ($notification->type == 'task approved')
            return __('header.task_approved',
                ['project_name' => $notification->project->name,
                    'user_name' => $notification->user->first_name . ' ' . $notification->user->last_name,
                    'task_name' => $notification->task->name
                ]);
        else if ($notification->type == 'task completed')
            return __('header.task_completed',
                ['project_name' => $notification->project->name,
                    'user_name' => $notification->user->first_name . ' ' . $notification->user->last_name,
                    'task_name' => $notification->task->name
                ]);
        else if ($notification->type == 'task updated')
            return __('header.task_updated',
                ['project_name' => $notification->project->name,
                    'user_name' => $notification->user->first_name . ' ' . $notification->user->last_name,
                    'task_name' => $notification->task->name
                ]);
        else if ($notification->type == 'task pending')
            return __('header.task_pending',
                ['project_name' => $notification->project->name,
                    'user_name' => $notification->user->first_name . ' ' . $notification->user->last_name,
                    'task_name' => $notification->task->name
                ]);
        else if ($notification->type == 'action done')
            return __('header.action_done', ['task_name' => $notification->task->name]);
        else
            return __('header.something_went_wrong');
    }
}

if (!function_exists('checkWorkRule')) {
    function checkWorkRule($project_id, $rule) {
        $work_rule = WorkRule::where('project_id', $project_id)->where('rule', $rule)->where('status', 1)->first();
        if ($work_rule)
            return true;
        else
            return false;
    }
}
