<?php

namespace App\Containers\AppSection\Media\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Media\Tasks\ListMediaTask;
use App\Containers\AppSection\Media\UI\API\Requests\ListMediaRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListMediaAction extends ParentAction
{
    public function __construct(
        private readonly ListMediaTask $listMediaTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListMediaRequest $request): mixed
    {
        return $this->listMediaTask->run();
    }
}
