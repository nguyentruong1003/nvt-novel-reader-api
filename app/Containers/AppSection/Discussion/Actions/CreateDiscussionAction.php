<?php

namespace App\Containers\AppSection\Discussion\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Containers\AppSection\Discussion\Tasks\CreateDiscussionTask;
use App\Containers\AppSection\Discussion\UI\API\Requests\CreateDiscussionRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateDiscussionAction extends ParentAction
{
    public function __construct(
        private readonly CreateDiscussionTask $createDiscussionTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateDiscussionRequest $request): Discussion
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'content',
            'type',
            'novel_id'
        ]);

        return $this->createDiscussionTask->run($data);
    }
}
