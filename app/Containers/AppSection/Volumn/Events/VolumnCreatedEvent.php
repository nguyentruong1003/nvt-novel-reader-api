<?php

namespace App\Containers\AppSection\Volumn\Events;

use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class VolumnCreatedEvent extends ParentEvent
{
    public function __construct(
        public readonly Volumn $volumn,
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
