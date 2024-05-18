<?php

namespace App\Containers\AppSection\TranslatorGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TranslatorGroup\Actions\UpdateTranslatorGroupAction;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\UpdateTranslatorGroupRequest;
use App\Containers\AppSection\TranslatorGroup\UI\API\Transformers\TranslatorGroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateTranslatorGroupController extends ApiController
{
    public function __construct(
        private readonly UpdateTranslatorGroupAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateTranslatorGroupRequest $request): array
    {
        $translatorgroup = $this->action->run($request);

        return $this->transform($translatorgroup, TranslatorGroupTransformer::class);
    }
}
