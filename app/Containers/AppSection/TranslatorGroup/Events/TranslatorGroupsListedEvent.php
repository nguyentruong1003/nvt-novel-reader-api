<?php

namespace App\Containers\AppSection\TranslatorGroup\Events;

use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TranslatorGroupsListedEvent extends ParentEvent
{
    public function __construct(
        public readonly mixed $translatorgroup,
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
