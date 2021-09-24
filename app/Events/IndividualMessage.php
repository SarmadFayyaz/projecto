<?php

namespace App\Events;

use App\Models\Mod_messages;
use App\Models\IndividualConversation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class IndividualMessage implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $receiver;
    public $message;
    public $individual_conversation;

    public function __construct($user, $receiver, $message) {
        $this->user = $user;
        $this->receiver = $receiver;
        $this->message = $message;
        $this->individual_conversation = IndividualConversation::with('user', 'document')
            ->where('user_id', Auth::user()->id)
            ->where('receiver_id', $receiver)
            ->orwhere('user_id', $receiver)
            ->where('receiver_id', Auth::user()->id)
            ->latest()->first();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        if ($this->user == $this->receiver) {
            $channels = [
                'receiver.' . $this->user,
            ];
        } else {
            $channels = [
                'receiver.' . $this->user,
                'receiver.' . $this->receiver
            ];
        }

        return $channels;
    }

    public function broadcastAs() {
        return 'IndividualMessage';
    }
}
