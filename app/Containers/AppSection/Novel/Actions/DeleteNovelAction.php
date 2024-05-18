<?php

namespace App\Containers\AppSection\Novel\Actions;

use App\Containers\AppSection\Novel\Tasks\DeleteNovelTask;
use App\Containers\AppSection\Novel\UI\API\Requests\DeleteNovelRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteNovelAction extends ParentAction
{
    public function __construct(
        private readonly DeleteNovelTask $deleteNovelTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteNovelRequest $request): int
    {
        return $this->deleteNovelTask->run($request->id);
    }
}
