<?php

namespace App\Containers\AppSection\NovelStatus\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\NovelStatus\Tasks\ListNovelStatusesTask;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\ListNovelStatusesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelStatusesAction extends ParentAction
{
    public function __construct(
        private readonly ListNovelStatusesTask $listNovelStatusesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNovelStatusesRequest $request): mixed
    {
        return $this->listNovelStatusesTask->run();
    }
}
