<?php

namespace App\Containers\AppSection\Discussion\Actions;

use App\Containers\AppSection\Discussion\Tasks\DeleteDiscussionTask;
use App\Containers\AppSection\Discussion\UI\API\Requests\DeleteDiscussionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteDiscussionAction extends ParentAction
{
    public function __construct(
        private readonly DeleteDiscussionTask $deleteDiscussionTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteDiscussionRequest $request): int
    {
        return $this->deleteDiscussionTask->run($request->id);
    }
}
