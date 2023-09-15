<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $userName;
    public $roomId;
    public $body;
    public $createdAt;

    /**
     * Create a new event instance.
     */
    public function __construct($userId, $userName, $roomId, $body, $createdAt)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->roomId = $roomId;
        $this->body = $body;
        $this->createdAt = $createdAt->format('Y-m-d h:i:s');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('chat.'.$this->roomId),
        ];
    }
}
