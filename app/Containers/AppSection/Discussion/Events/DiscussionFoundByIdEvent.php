<?php

namespace App\Containers\AppSection\Discussion\Events;

use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class DiscussionFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public readonly Discussion $discussion,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
