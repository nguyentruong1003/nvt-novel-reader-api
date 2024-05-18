<?php

namespace App\Containers\AppSection\Discussion\Tasks;

use App\Containers\AppSection\Discussion\Data\Repositories\DiscussionRepository;
use App\Containers\AppSection\Discussion\Events\DiscussionCreatedEvent;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateDiscussionTask extends ParentTask
{
    public function __construct(
        protected readonly DiscussionRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Discussion
    {
        try {
            $discussion = $this->repository->create($data);
            DiscussionCreatedEvent::dispatch($discussion);

            return $discussion;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
