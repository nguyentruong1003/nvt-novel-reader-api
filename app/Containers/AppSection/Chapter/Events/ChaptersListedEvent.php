<?php

namespace App\Containers\AppSection\Chapter\Events;

use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ChaptersListedEvent extends ParentEvent
{
    public function __construct(
        public readonly mixed $chapter,
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
