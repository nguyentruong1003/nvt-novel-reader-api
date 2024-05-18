<?php

namespace App\Containers\AppSection\Discussion\Tasks;

use App\Containers\AppSection\Discussion\Data\Repositories\DiscussionRepository;
use App\Containers\AppSection\Discussion\Events\DiscussionDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteDiscussionTask extends ParentTask
{
    public function __construct(
        protected readonly DiscussionRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            DiscussionDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
