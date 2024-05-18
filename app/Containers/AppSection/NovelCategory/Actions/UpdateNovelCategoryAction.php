<?php

namespace App\Containers\AppSection\NovelCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Containers\AppSection\NovelCategory\Tasks\UpdateNovelCategoryTask;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\UpdateNovelCategoryRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateNovelCategoryAction extends ParentAction
{
    public function __construct(
        private readonly UpdateNovelCategoryTask $updateNovelCategoryTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateNovelCategoryRequest $request): NovelCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateNovelCategoryTask->run($data, $request->id);
    }
}
