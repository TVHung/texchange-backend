<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $image_url;
    public $target_user_id;
    public $user_id;
    // public $created_at;

    public function __construct($message, $image_url, $target_user_id, $user_id)
    {
        $this->message = $message;
        $this->image_url = $image_url;
        $this->target_user_id = $target_user_id;
        $this->user_id = $user_id;
        // $this->created_at = $created_at;
    }

    public function broadcastOn()
    {
        // return new PrivateChannel('chat');
        return ['chat'];
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
