<?php

namespace App\Containers\AppSection\NovelStatus\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Containers\AppSection\NovelStatus\Tasks\CreateNovelStatusTask;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\CreateNovelStatusRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateNovelStatusAction extends ParentAction
{
    public function __construct(
        private readonly CreateNovelStatusTask $createNovelStatusTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateNovelStatusRequest $request): NovelStatus
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'slug'
        ]);

        return $this->createNovelStatusTask->run($data);
    }
}
