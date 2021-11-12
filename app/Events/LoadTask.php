<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoadTask implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;

    public function __construct($task) {
        $this->task = $task;
    }

    public function broadcastOn() {
        $channels = [];
        array_push($channels, 'my-channel.' . $this->task->added_by);
        foreach ($this->task->taskUser as $task_user) {
            array_push($channels, 'my-channel.' . $task_user->user_id);
        }
        return $channels;
    }

    public function broadcastAs() {
        return 'LoadTask';
    }
}
