<?php

namespace App\Containers\AppSection\NovelCategory\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\NovelCategory\Tasks\ListNovelCategoriesTask;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\ListNovelCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelCategoriesAction extends ParentAction
{
    public function __construct(
        private readonly ListNovelCategoriesTask $listNovelCategoriesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNovelCategoriesRequest $request): mixed
    {
        return $this->listNovelCategoriesTask->run();
    }
}
