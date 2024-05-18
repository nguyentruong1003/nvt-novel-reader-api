<?php

namespace App\Containers\AppSection\NovelStatus\Tasks;

use App\Containers\AppSection\NovelStatus\Data\Repositories\NovelStatusRepository;
use App\Containers\AppSection\NovelStatus\Events\NovelStatusUpdatedEvent;
use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateNovelStatusTask extends ParentTask
{
    public function __construct(
        protected readonly NovelStatusRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): NovelStatus
    {
        try {
            $novelstatus = $this->repository->update($data, $id);
            NovelStatusUpdatedEvent::dispatch($novelstatus);

            return $novelstatus;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
