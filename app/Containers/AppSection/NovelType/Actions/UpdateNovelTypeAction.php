<?php

namespace App\Containers\AppSection\NovelType\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Containers\AppSection\NovelType\Tasks\UpdateNovelTypeTask;
use App\Containers\AppSection\NovelType\UI\API\Requests\UpdateNovelTypeRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateNovelTypeAction extends ParentAction
{
    public function __construct(
        private readonly UpdateNovelTypeTask $updateNovelTypeTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateNovelTypeRequest $request): NovelType
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'slug'
        ]);

        return $this->updateNovelTypeTask->run($data, $request->id);
    }
}
