<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectNotification implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project;
    public $notification;

    public function __construct($project, $notification) {
        $this->project = $project;
        $this->notification = $notification;
    }


    public function broadcastOn() {
        $channels = [];

        array_push($channels, 'my-channel.' . $this->project->project_leader);
        foreach ($this->project->projectUser as $projectUser) {
            array_push($channels, 'my-channel.' . $projectUser->user_id);
        }
        return $channels;
    }

    public function broadcastAs() {
        return 'ProjectNotification';
    }
}
