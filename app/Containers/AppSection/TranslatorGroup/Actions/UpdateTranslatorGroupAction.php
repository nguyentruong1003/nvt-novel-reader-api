<?php

namespace App\Containers\AppSection\TranslatorGroup\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Containers\AppSection\TranslatorGroup\Tasks\UpdateTranslatorGroupTask;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\UpdateTranslatorGroupRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTranslatorGroupAction extends ParentAction
{
    public function __construct(
        private readonly UpdateTranslatorGroupTask $updateTranslatorGroupTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTranslatorGroupRequest $request): TranslatorGroup
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'note',
            'slug',
            'user_id'
        ]);

        return $this->updateTranslatorGroupTask->run($data, $request->id);
    }
}
