<?php

namespace App\Containers\AppSection\Discussion\Tasks;

use App\Containers\AppSection\Discussion\Data\Repositories\DiscussionRepository;
use App\Containers\AppSection\Discussion\Events\DiscussionFoundByIdEvent;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindDiscussionByIdTask extends ParentTask
{
    public function __construct(
        protected readonly DiscussionRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Discussion
    {
        try {
            $discussion = $this->repository->find($id);
            DiscussionFoundByIdEvent::dispatch($discussion);

            return $discussion;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
