<?php

namespace App\Containers\AppSection\NovelCategory\Actions;

use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Containers\AppSection\NovelCategory\Tasks\FindNovelCategoryByIdTask;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\FindNovelCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindNovelCategoryByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindNovelCategoryByIdTask $findNovelCategoryByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindNovelCategoryByIdRequest $request): NovelCategory
    {
        return $this->findNovelCategoryByIdTask->run($request->id);
    }
}
