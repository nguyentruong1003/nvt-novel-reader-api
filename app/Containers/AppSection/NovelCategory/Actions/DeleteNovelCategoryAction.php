<?php

namespace App\Containers\AppSection\NovelCategory\Actions;

use App\Containers\AppSection\NovelCategory\Tasks\DeleteNovelCategoryTask;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\DeleteNovelCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteNovelCategoryAction extends ParentAction
{
    public function __construct(
        private readonly DeleteNovelCategoryTask $deleteNovelCategoryTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteNovelCategoryRequest $request): int
    {
        return $this->deleteNovelCategoryTask->run($request->id);
    }
}
