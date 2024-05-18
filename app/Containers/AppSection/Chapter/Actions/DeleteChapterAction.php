<?php

namespace App\Containers\AppSection\Chapter\Actions;

use App\Containers\AppSection\Chapter\Tasks\DeleteChapterTask;
use App\Containers\AppSection\Chapter\UI\API\Requests\DeleteChapterRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteChapterAction extends ParentAction
{
    public function __construct(
        private readonly DeleteChapterTask $deleteChapterTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteChapterRequest $request): int
    {
        return $this->deleteChapterTask->run($request->id);
    }
}
