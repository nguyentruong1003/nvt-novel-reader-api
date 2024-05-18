<?php

namespace App\Containers\AppSection\NovelStatus\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Containers\AppSection\NovelStatus\Tasks\UpdateNovelStatusTask;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\UpdateNovelStatusRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateNovelStatusAction extends ParentAction
{
    public function __construct(
        private readonly UpdateNovelStatusTask $updateNovelStatusTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateNovelStatusRequest $request): NovelStatus
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'slug'
        ]);

        return $this->updateNovelStatusTask->run($data, $request->id);
    }
}
