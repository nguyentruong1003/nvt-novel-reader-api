<?php

namespace App\Containers\AppSection\NovelStatus\Tasks;

use App\Containers\AppSection\NovelStatus\Data\Repositories\NovelStatusRepository;
use App\Containers\AppSection\NovelStatus\Events\NovelStatusCreatedEvent;
use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateNovelStatusTask extends ParentTask
{
    public function __construct(
        protected readonly NovelStatusRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): NovelStatus
    {
        try {
            $data['slug'] = slugCreate($data['title']);
            $novelstatus = $this->repository->create($data);
            NovelStatusCreatedEvent::dispatch($novelstatus);

            return $novelstatus;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
