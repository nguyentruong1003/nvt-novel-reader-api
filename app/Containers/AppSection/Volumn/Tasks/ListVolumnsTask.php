<?php

namespace App\Containers\AppSection\Volumn\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Volumn\Data\Repositories\VolumnRepository;
use App\Containers\AppSection\Volumn\Events\VolumnsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListVolumnsTask extends ParentTask
{
    public function __construct(
        protected readonly VolumnRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        VolumnsListedEvent::dispatch($result);

        return $result;
    }
}
