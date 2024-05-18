<?php

namespace App\Containers\AppSection\TranslatorGroup\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Containers\AppSection\TranslatorGroup\Tasks\CreateTranslatorGroupTask;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\CreateTranslatorGroupRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTranslatorGroupAction extends ParentAction
{
    public function __construct(
        private readonly CreateTranslatorGroupTask $createTranslatorGroupTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTranslatorGroupRequest $request): TranslatorGroup
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'note',
            'slug',
            'user_id'
        ]);

        return $this->createTranslatorGroupTask->run($data);
    }
}
