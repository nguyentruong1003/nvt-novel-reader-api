<?php

namespace App\Containers\AppSection\NovelCategory\Events;

use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class NovelCategoryCreatedEvent extends ParentEvent
{
    public function __construct(
        public readonly NovelCategory $novelcategory,
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
