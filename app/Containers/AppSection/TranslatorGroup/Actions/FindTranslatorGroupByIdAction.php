<?php

namespace App\Containers\AppSection\TranslatorGroup\Actions;

use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Containers\AppSection\TranslatorGroup\Tasks\FindTranslatorGroupByIdTask;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\FindTranslatorGroupByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTranslatorGroupByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindTranslatorGroupByIdTask $findTranslatorGroupByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindTranslatorGroupByIdRequest $request): TranslatorGroup
    {
        return $this->findTranslatorGroupByIdTask->run($request->id);
    }
}
