<?php

namespace App\Containers\AppSection\NovelType\Tasks;

use App\Containers\AppSection\NovelType\Data\Repositories\NovelTypeRepository;
use App\Containers\AppSection\NovelType\Events\NovelTypeFoundByIdEvent;
use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindNovelTypeByIdTask extends ParentTask
{
    public function __construct(
        protected readonly NovelTypeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): NovelType
    {
        try {
            $noveltype = $this->repository->find($id);
            NovelTypeFoundByIdEvent::dispatch($noveltype);

            return $noveltype;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
