<?php

namespace App\Containers\AppSection\NovelStatus\Actions;

use App\Containers\AppSection\NovelStatus\Tasks\DeleteNovelStatusTask;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\DeleteNovelStatusRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteNovelStatusAction extends ParentAction
{
    public function __construct(
        private readonly DeleteNovelStatusTask $deleteNovelStatusTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteNovelStatusRequest $request): int
    {
        return $this->deleteNovelStatusTask->run($request->id);
    }
}
