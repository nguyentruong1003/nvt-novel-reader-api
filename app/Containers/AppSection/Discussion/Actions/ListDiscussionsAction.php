<?php

namespace App\Containers\AppSection\Discussion\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Discussion\Tasks\ListDiscussionsTask;
use App\Containers\AppSection\Discussion\UI\API\Requests\ListDiscussionsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListDiscussionsAction extends ParentAction
{
    public function __construct(
        private readonly ListDiscussionsTask $listDiscussionsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListDiscussionsRequest $request): mixed
    {
        return $this->listDiscussionsTask->run();
    }
}
