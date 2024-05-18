<?php

namespace App\Containers\AppSection\Media\Events;

use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class MediaListedEvent extends ParentEvent
{
    public function __construct(
        public readonly mixed $media,
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
