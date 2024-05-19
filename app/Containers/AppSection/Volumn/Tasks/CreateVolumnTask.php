<?php

namespace App\Containers\AppSection\Volumn\Tasks;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Volumn\Data\Repositories\VolumnRepository;
use App\Containers\AppSection\Volumn\Events\VolumnCreatedEvent;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateVolumnTask extends ParentTask
{
    use HashIdTrait;

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
            $volumn = $this->repository->create($data);

            $updateData = [
                'slug' => slugCreate($data['title'], $this->encode($volumn->id))
            ];
            $volumn = $this->repository->update($updateData, $volumn->id);
            VolumnCreatedEvent::dispatch($volumn);

            return $volumn;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
