<?php

namespace App\Containers\AppSection\Volumn\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Volumn\Tasks\ListVolumnsTask;
use App\Containers\AppSection\Volumn\UI\API\Requests\ListVolumnsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListVolumnsAction extends ParentAction
{
    public function __construct(
        private readonly ListVolumnsTask $listVolumnsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListVolumnsRequest $request): mixed
    {
        return $this->listVolumnsTask->run();
    }
}
