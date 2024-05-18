<?php

namespace App\Containers\AppSection\NovelStatus\Tasks;

use App\Containers\AppSection\NovelStatus\Data\Repositories\NovelStatusRepository;
use App\Containers\AppSection\NovelStatus\Events\NovelStatusFoundByIdEvent;
use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindNovelStatusByIdTask extends ParentTask
{
    public function __construct(
        protected readonly NovelStatusRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): NovelStatus
    {
        try {
            $novelstatus = $this->repository->find($id);
            NovelStatusFoundByIdEvent::dispatch($novelstatus);

            return $novelstatus;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
