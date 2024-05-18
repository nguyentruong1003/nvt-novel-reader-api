<?php

namespace App\Containers\AppSection\NovelType\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\NovelType\Data\Repositories\NovelTypeRepository;
use App\Containers\AppSection\NovelType\Events\NovelTypesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelTypesTask extends ParentTask
{
    public function __construct(
        protected readonly NovelTypeRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        NovelTypesListedEvent::dispatch($result);

        return $result;
    }
}
