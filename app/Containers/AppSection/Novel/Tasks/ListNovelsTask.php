<?php

namespace App\Containers\AppSection\Novel\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Novel\Data\Repositories\NovelRepository;
use App\Containers\AppSection\Novel\Events\NovelsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelsTask extends ParentTask
{
    public function __construct(
        protected readonly NovelRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        NovelsListedEvent::dispatch($result);

        return $result;
    }
}
