<?php

namespace App\Containers\AppSection\NovelCategory\Tasks;

use App\Containers\AppSection\NovelCategory\Data\Repositories\NovelCategoryRepository;
use App\Containers\AppSection\NovelCategory\Events\NovelCategoryFoundByIdEvent;
use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindNovelCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected readonly NovelCategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): NovelCategory
    {
        try {
            $novelcategory = $this->repository->find($id);
            NovelCategoryFoundByIdEvent::dispatch($novelcategory);

            return $novelcategory;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
