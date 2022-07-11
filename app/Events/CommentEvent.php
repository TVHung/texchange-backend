<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;
    public $product_id;
    public function __construct($comment, $product_id)
    {   
        $this->comment = $comment;
        $this->product_id = $product_id;
    }
    public function broadcastOn()
    {
        return ['comment'];
    }

    public function broadcastAs()
    {
        return 'comment';
    }
}
