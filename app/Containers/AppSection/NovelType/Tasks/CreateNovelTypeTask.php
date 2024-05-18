<?php

namespace App\Containers\AppSection\NovelType\Tasks;

use App\Containers\AppSection\NovelType\Data\Repositories\NovelTypeRepository;
use App\Containers\AppSection\NovelType\Events\NovelTypeCreatedEvent;
use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateNovelTypeTask extends ParentTask
{
    public function __construct(
        protected readonly NovelTypeRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): NovelType
    {
        try {
            $data['slug'] = slugCreate($data['title']);
            $noveltype = $this->repository->create($data);
            NovelTypeCreatedEvent::dispatch($noveltype);

            return $noveltype;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
