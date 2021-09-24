<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskAdded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $task;
    public $notification;
    public function __construct($task,$notification)
    {
        $this->task   = $task;
        $this->notification = $notification;
    }

    public function broadcastOn()
    {

        $channels = [];
        if ($this->task->getProject != null && $this->task->getProject->count() > 0)
        {
            foreach (explode(',',$this->task->getProject->team_members) as $user) {
                array_push($channels, 'my-channel.' . $user);
            }
            array_push($channels, 'my-channel.' . $this->task->getProject->project_leader);
        }


        return $channels;
        //return ['my-channel.7'];
    }
    public function broadcastAs()
    {
        return 'TaskAdded';
    }
}
