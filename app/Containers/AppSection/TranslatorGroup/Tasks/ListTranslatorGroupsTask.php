<?php

namespace App\Containers\AppSection\TranslatorGroup\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\TranslatorGroup\Data\Repositories\TranslatorGroupRepository;
use App\Containers\AppSection\TranslatorGroup\Events\TranslatorGroupsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTranslatorGroupsTask extends ParentTask
{
    public function __construct(
        protected readonly TranslatorGroupRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        TranslatorGroupsListedEvent::dispatch($result);

        return $result;
    }
}
