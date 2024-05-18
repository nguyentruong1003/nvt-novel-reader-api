<?php

namespace App\Containers\AppSection\NovelType\Events;

use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class NovelTypeDeletedEvent extends ParentEvent
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
