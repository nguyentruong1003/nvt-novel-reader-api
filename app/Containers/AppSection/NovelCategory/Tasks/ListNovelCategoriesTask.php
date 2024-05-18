<?php

namespace App\Containers\AppSection\NovelCategory\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\NovelCategory\Data\Repositories\NovelCategoryRepository;
use App\Containers\AppSection\NovelCategory\Events\NovelCategoriesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelCategoriesTask extends ParentTask
{
    public function __construct(
        protected readonly NovelCategoryRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        NovelCategoriesListedEvent::dispatch($result);

        return $result;
    }
}
