<?php

namespace App\Containers\AppSection\NovelType\Actions;

use App\Containers\AppSection\NovelType\Tasks\DeleteNovelTypeTask;
use App\Containers\AppSection\NovelType\UI\API\Requests\DeleteNovelTypeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteNovelTypeAction extends ParentAction
{
    public function __construct(
        private readonly DeleteNovelTypeTask $deleteNovelTypeTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteNovelTypeRequest $request): int
    {
        return $this->deleteNovelTypeTask->run($request->id);
    }
}
