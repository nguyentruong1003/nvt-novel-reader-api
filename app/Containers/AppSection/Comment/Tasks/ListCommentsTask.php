<?php

namespace App\Containers\AppSection\Comment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Comment\Data\Repositories\CommentRepository;
use App\Containers\AppSection\Comment\Events\CommentsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCommentsTask extends ParentTask
{
    public function __construct(
        protected readonly CommentRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        CommentsListedEvent::dispatch($result);

        return $result;
    }
}
