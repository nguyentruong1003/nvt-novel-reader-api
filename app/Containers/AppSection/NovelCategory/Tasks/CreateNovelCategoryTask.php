<?php

namespace App\Containers\AppSection\NovelCategory\Tasks;

use App\Containers\AppSection\NovelCategory\Data\Repositories\NovelCategoryRepository;
use App\Containers\AppSection\NovelCategory\Events\NovelCategoryCreatedEvent;
use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateNovelCategoryTask extends ParentTask
{
    public function __construct(
        protected readonly NovelCategoryRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): NovelCategory
    {
        try {
            $data['slug'] = slugCreate($data['title']);
            $novelcategory = $this->repository->create($data);
            NovelCategoryCreatedEvent::dispatch($novelcategory);

            return $novelcategory;
        } catch (\Exception $exception) {
            dd ($exception);
            throw new CreateResourceFailedException();
        }
    }
}
