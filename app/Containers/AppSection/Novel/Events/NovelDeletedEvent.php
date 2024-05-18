<?php

namespace App\Containers\AppSection\Novel\Events;

use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class NovelDeletedEvent extends ParentEvent
{
    public function __construct(
        public readonly int $result,
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
