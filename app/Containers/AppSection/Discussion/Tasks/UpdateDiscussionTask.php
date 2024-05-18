<?php

namespace App\Containers\AppSection\Discussion\Tasks;

use App\Containers\AppSection\Discussion\Data\Repositories\DiscussionRepository;
use App\Containers\AppSection\Discussion\Events\DiscussionUpdatedEvent;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateDiscussionTask extends ParentTask
{
    public function __construct(
        protected readonly DiscussionRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Discussion
    {
        try {
            $discussion = $this->repository->update($data, $id);
            DiscussionUpdatedEvent::dispatch($discussion);

            return $discussion;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
