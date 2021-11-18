<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskNoteEvent implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project;

    public function __construct($project) {
        $this->project = $project;
    }

    public function broadcastOn() {
        $channels = [];
        array_push($channels, 'my-channel.' . $this->project->project_leader);
        foreach ($this->project->projectUser as $project_user) {
            array_push($channels, 'my-channel.' . $project_user->user_id);
        }
        return $channels;
    }

    public function broadcastAs() {
        return 'TaskNoteEvent';
    }
}
