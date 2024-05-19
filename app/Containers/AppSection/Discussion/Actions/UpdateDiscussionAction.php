<?php

namespace App\Containers\AppSection\Discussion\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Containers\AppSection\Discussion\Tasks\UpdateDiscussionTask;
use App\Containers\AppSection\Discussion\UI\API\Requests\UpdateDiscussionRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateDiscussionAction extends ParentAction
{
    public function __construct(
        private readonly UpdateDiscussionTask $updateDiscussionTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateDiscussionRequest $request): Discussion
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'content',
            'type'
        ]);

        return $this->updateDiscussionTask->run($data, $request->id);
    }
}
