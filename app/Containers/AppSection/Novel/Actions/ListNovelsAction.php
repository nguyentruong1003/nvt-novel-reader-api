<?php

namespace App\Containers\AppSection\Novel\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Novel\Tasks\ListNovelsTask;
use App\Containers\AppSection\Novel\UI\API\Requests\ListNovelsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelsAction extends ParentAction
{
    public function __construct(
        private readonly ListNovelsTask $listNovelsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNovelsRequest $request): mixed
    {
        return $this->listNovelsTask->run();
    }
}
