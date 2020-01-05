<?php

namespace App\Events;

use App\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $comment;

    /**
     * Create a new event instance.
     *
     * @param  Comment  $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('comment');
    }


    public function broadcastWith()
    {
        return [
            'data' => $this->comment
        ];
    }
}
