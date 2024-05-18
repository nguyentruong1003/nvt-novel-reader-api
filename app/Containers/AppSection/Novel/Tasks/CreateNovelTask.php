<?php

namespace App\Containers\AppSection\Novel\Tasks;

use App\Containers\AppSection\Novel\Data\Repositories\NovelRepository;
use App\Containers\AppSection\Novel\Events\NovelCreatedEvent;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateNovelTask extends ParentTask
{
    public function __construct(
        protected readonly NovelRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Novel
    {
        try {
            $novel = $this->repository->create($data);
            NovelCreatedEvent::dispatch($novel);

            return $novel;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
