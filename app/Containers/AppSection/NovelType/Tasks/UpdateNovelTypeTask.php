<?php

namespace App\Containers\AppSection\NovelType\Tasks;

use App\Containers\AppSection\NovelType\Data\Repositories\NovelTypeRepository;
use App\Containers\AppSection\NovelType\Events\NovelTypeUpdatedEvent;
use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateNovelTypeTask extends ParentTask
{
    public function __construct(
        protected readonly NovelTypeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): NovelType
    {
        try {
            $noveltype = $this->repository->update($data, $id);
            NovelTypeUpdatedEvent::dispatch($noveltype);

            return $noveltype;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
