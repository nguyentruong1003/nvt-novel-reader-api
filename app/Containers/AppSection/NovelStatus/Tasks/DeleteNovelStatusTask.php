<?php

namespace App\Containers\AppSection\NovelStatus\Tasks;

use App\Containers\AppSection\NovelStatus\Data\Repositories\NovelStatusRepository;
use App\Containers\AppSection\NovelStatus\Events\NovelStatusDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteNovelStatusTask extends ParentTask
{
    public function __construct(
        protected readonly NovelStatusRepository $repository,
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
            NovelStatusDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
