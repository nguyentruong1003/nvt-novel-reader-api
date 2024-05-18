<?php

namespace App\Containers\AppSection\NovelCategory\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Containers\AppSection\NovelCategory\Tasks\CreateNovelCategoryTask;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\CreateNovelCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateNovelCategoryAction extends ParentAction
{
    public function __construct(
        private readonly CreateNovelCategoryTask $createNovelCategoryTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateNovelCategoryRequest $request): NovelCategory
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'description',
            'slug'
        ]);

        return $this->createNovelCategoryTask->run($data);
    }
}
