<?php

namespace App\Containers\AppSection\NovelType\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\NovelType\Tasks\ListNovelTypesTask;
use App\Containers\AppSection\NovelType\UI\API\Requests\ListNovelTypesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelTypesAction extends ParentAction
{
    public function __construct(
        private readonly ListNovelTypesTask $listNovelTypesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNovelTypesRequest $request): mixed
    {
        return $this->listNovelTypesTask->run();
    }
}
