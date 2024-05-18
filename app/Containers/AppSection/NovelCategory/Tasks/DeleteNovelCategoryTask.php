<?php

namespace App\Containers\AppSection\NovelCategory\Tasks;

use App\Containers\AppSection\NovelCategory\Data\Repositories\NovelCategoryRepository;
use App\Containers\AppSection\NovelCategory\Events\NovelCategoryDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteNovelCategoryTask extends ParentTask
{
    public function __construct(
        protected readonly NovelCategoryRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            NovelCategoryDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
