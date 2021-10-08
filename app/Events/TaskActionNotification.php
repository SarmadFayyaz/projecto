<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskActionNotification implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task_action;
    public $notificaton;

    public function __construct($task_action, $notificaton) {
        $this->task_action = $task_action;
        $this->notificaton = $notificaton;
    }


    public function broadcastOn() {
        $channels = [];
        if ($this->task_action->task->project != null && $this->task_action->task->project->count() > 0) {
            array_push($channels, 'my-channel.' . $this->task_action->task->project->project_leader);
        }
        return $channels;
    }

    public function broadcastAs() {
        return 'TaskActionNotification';
    }
}
