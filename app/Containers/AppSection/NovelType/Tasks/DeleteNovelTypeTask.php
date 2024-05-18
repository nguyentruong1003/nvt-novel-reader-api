<?php

namespace App\Containers\AppSection\NovelType\Tasks;

use App\Containers\AppSection\NovelType\Data\Repositories\NovelTypeRepository;
use App\Containers\AppSection\NovelType\Events\NovelTypeDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteNovelTypeTask extends ParentTask
{
    public function __construct(
        protected readonly NovelTypeRepository $repository,
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
            NovelTypeDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
