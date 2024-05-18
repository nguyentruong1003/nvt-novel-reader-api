<?php

namespace App\Containers\AppSection\TranslatorGroup\Actions;

use App\Containers\AppSection\TranslatorGroup\Tasks\DeleteTranslatorGroupTask;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\DeleteTranslatorGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTranslatorGroupAction extends ParentAction
{
    public function __construct(
        private readonly DeleteTranslatorGroupTask $deleteTranslatorGroupTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTranslatorGroupRequest $request): int
    {
        return $this->deleteTranslatorGroupTask->run($request->id);
    }
}
