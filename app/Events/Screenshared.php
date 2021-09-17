<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Screenshared implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project;
    public $userID;
    public $status;

    public function __construct($project, $userID, $status) {
        $this->project = $project;
        $this->userID = $userID;
        $this->status = $status;
    }

    public function broadcastOn() {
        $channels = [];

        if ($this->project->project_leader != $this->userID)
            array_push($channels, 'screen-shared.' . $this->project->ptoject_leader);
        foreach ($this->project->projectUser as $user) {
            if ($user->user->id != $this->userID)
                array_push($channels, 'screen-shared.' . $user->id);
        }

        return $channels;
        //return ['my-channel.7'];
    }

    public function broadcastAs() {
        return 'ScreenShared';
    }
}
