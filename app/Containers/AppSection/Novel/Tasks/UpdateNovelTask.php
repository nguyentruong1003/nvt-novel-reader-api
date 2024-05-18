<?php

namespace App\Containers\AppSection\Novel\Tasks;

use App\Containers\AppSection\Novel\Data\Repositories\NovelRepository;
use App\Containers\AppSection\Novel\Events\NovelUpdatedEvent;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateNovelTask extends ParentTask
{
    public function __construct(
        protected readonly NovelRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Novel
    {
        try {
            $novel = $this->repository->update($data, $id);
            NovelUpdatedEvent::dispatch($novel);

            return $novel;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
