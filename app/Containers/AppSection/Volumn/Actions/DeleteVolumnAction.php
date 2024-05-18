<?php

namespace App\Containers\AppSection\Volumn\Actions;

use App\Containers\AppSection\Volumn\Tasks\DeleteVolumnTask;
use App\Containers\AppSection\Volumn\UI\API\Requests\DeleteVolumnRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteVolumnAction extends ParentAction
{
    public function __construct(
        private readonly DeleteVolumnTask $deleteVolumnTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteVolumnRequest $request): int
    {
        return $this->deleteVolumnTask->run($request->id);
    }
}
