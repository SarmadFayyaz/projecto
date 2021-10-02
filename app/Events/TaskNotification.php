<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskNotification implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;
    public $notification;

    public function __construct($task, $notification) {
        $this->task = $task;
        $this->notification = $notification;
    }

    public function broadcastOn() {

        $channels = [];
        if ($this->task->project != null && $this->task->project->count() > 0) {
            array_push($channels, 'my-channel.' . $this->task->project->project_leader);
            foreach ($this->task->project->projectUser as $project_user) {
                array_push($channels, 'my-channel.' . $project_user->user_id);
            }
        }
        return $channels;
    }

    public function broadcastAs() {
        return 'TaskNotification';
    }
}
