<?php

namespace App\Containers\AppSection\Media\Tasks;

use App\Containers\AppSection\Media\Data\Repositories\MediaRepository;
use App\Containers\AppSection\Media\Events\MediaCreatedEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateMediaTask extends ParentTask
{
    public function __construct(
        protected readonly MediaRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Media
    {
        try {
            $media = $this->repository->create($data);
            MediaCreatedEvent::dispatch($media);

            return $media;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
