<?php

namespace App\Containers\AppSection\Volumn\Tasks;

use App\Containers\AppSection\Volumn\Data\Repositories\VolumnRepository;
use App\Containers\AppSection\Volumn\Events\VolumnCreatedEvent;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateVolumnTask extends ParentTask
{
    public function __construct(
        protected readonly VolumnRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Volumn
    {
        try {
            $data['slug'] = slugCreate($data['title']);
            $volumn = $this->repository->create($data);
            VolumnCreatedEvent::dispatch($volumn);

            return $volumn;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
