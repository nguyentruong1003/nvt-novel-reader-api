<?php

namespace App\Containers\AppSection\NovelStatus\Events;

use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class NovelStatusesListedEvent extends ParentEvent
{
    public function __construct(
        public readonly mixed $novelstatus,
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
