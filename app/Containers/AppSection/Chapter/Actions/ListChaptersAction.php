<?php

namespace App\Containers\AppSection\Chapter\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Chapter\Tasks\ListChaptersTask;
use App\Containers\AppSection\Chapter\UI\API\Requests\ListChaptersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListChaptersAction extends ParentAction
{
    public function __construct(
        private readonly ListChaptersTask $listChaptersTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListChaptersRequest $request): mixed
    {
        return $this->listChaptersTask->run();
    }
}
