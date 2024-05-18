<?php

namespace App\Containers\AppSection\NovelStatus\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\NovelStatus\Data\Repositories\NovelStatusRepository;
use App\Containers\AppSection\NovelStatus\Events\NovelStatusesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelStatusesTask extends ParentTask
{
    public function __construct(
        protected readonly NovelStatusRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        NovelStatusesListedEvent::dispatch($result);

        return $result;
    }
}
