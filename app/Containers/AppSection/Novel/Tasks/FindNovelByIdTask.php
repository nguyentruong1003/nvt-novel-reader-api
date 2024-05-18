<?php

namespace App\Containers\AppSection\Novel\Tasks;

use App\Containers\AppSection\Novel\Data\Repositories\NovelRepository;
use App\Containers\AppSection\Novel\Events\NovelFoundByIdEvent;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindNovelByIdTask extends ParentTask
{
    public function __construct(
        protected readonly NovelRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Novel
    {
        try {
            $novel = $this->repository->find($id);
            NovelFoundByIdEvent::dispatch($novel);

            return $novel;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
