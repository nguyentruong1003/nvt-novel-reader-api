<?php

namespace App\Containers\AppSection\Volumn\Tasks;

use App\Containers\AppSection\Volumn\Data\Repositories\VolumnRepository;
use App\Containers\AppSection\Volumn\Events\VolumnUpdatedEvent;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateVolumnTask extends ParentTask
{
    public function __construct(
        protected readonly VolumnRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Volumn
    {
        try {
            $data['slug'] = slugCreate($data['title']);
            $volumn = $this->repository->update($data, $id);
            VolumnUpdatedEvent::dispatch($volumn);

            return $volumn;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
