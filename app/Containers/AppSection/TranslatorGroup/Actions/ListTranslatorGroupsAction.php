<?php

namespace App\Containers\AppSection\TranslatorGroup\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\TranslatorGroup\Tasks\ListTranslatorGroupsTask;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\ListTranslatorGroupsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTranslatorGroupsAction extends ParentAction
{
    public function __construct(
        private readonly ListTranslatorGroupsTask $listTranslatorGroupsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListTranslatorGroupsRequest $request): mixed
    {
        return $this->listTranslatorGroupsTask->run();
    }
}
