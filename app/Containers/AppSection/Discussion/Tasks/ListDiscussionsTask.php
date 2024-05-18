<?php

namespace App\Containers\AppSection\Discussion\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Discussion\Data\Repositories\DiscussionRepository;
use App\Containers\AppSection\Discussion\Events\DiscussionsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListDiscussionsTask extends ParentTask
{
    public function __construct(
        protected readonly DiscussionRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        DiscussionsListedEvent::dispatch($result);

        return $result;
    }
}
