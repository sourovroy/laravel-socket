<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserSignedUp implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $username;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $username )
    {
        $this->username = $username;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('test-channel');
    }

    /**
     * Change broadcast event name
     * @return string
     */
    public function broadcastAs()
    {
        return 'UserSignedUp';
    }
}
