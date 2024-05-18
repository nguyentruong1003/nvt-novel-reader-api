<?php

namespace App\Containers\AppSection\Volumn\Tasks;

use App\Containers\AppSection\Volumn\Data\Repositories\VolumnRepository;
use App\Containers\AppSection\Volumn\Events\VolumnFoundByIdEvent;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindVolumnByIdTask extends ParentTask
{
    public function __construct(
        protected readonly VolumnRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Volumn
    {
        try {
            $volumn = $this->repository->find($id);
            VolumnFoundByIdEvent::dispatch($volumn);

            return $volumn;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
