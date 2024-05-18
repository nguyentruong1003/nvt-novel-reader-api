<?php

namespace App\Containers\AppSection\Discussion\Actions;

use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Containers\AppSection\Discussion\Tasks\FindDiscussionByIdTask;
use App\Containers\AppSection\Discussion\UI\API\Requests\FindDiscussionByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindDiscussionByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindDiscussionByIdTask $findDiscussionByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindDiscussionByIdRequest $request): Discussion
    {
        return $this->findDiscussionByIdTask->run($request->id);
    }
}
