<?php

namespace App\Containers\AppSection\NovelType\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Containers\AppSection\NovelType\Tasks\CreateNovelTypeTask;
use App\Containers\AppSection\NovelType\UI\API\Requests\CreateNovelTypeRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateNovelTypeAction extends ParentAction
{
    public function __construct(
        private readonly CreateNovelTypeTask $createNovelTypeTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateNovelTypeRequest $request): NovelType
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'slug'
        ]);

        return $this->createNovelTypeTask->run($data);
    }
}
