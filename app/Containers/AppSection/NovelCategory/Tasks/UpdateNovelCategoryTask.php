<?php

namespace App\Containers\AppSection\NovelCategory\Tasks;

use App\Containers\AppSection\NovelCategory\Data\Repositories\NovelCategoryRepository;
use App\Containers\AppSection\NovelCategory\Events\NovelCategoryUpdatedEvent;
use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateNovelCategoryTask extends ParentTask
{
    public function __construct(
        protected readonly NovelCategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): NovelCategory
    {
        try {
            $novelcategory = $this->repository->update($data, $id);
            NovelCategoryUpdatedEvent::dispatch($novelcategory);

            return $novelcategory;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
