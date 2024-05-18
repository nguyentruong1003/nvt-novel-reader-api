<?php

namespace App\Containers\AppSection\TranslatorGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TranslatorGroup\Actions\CreateTranslatorGroupAction;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\CreateTranslatorGroupRequest;
use App\Containers\AppSection\TranslatorGroup\UI\API\Transformers\TranslatorGroupTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateTranslatorGroupController extends ApiController
{
    public function __construct(
        private readonly CreateTranslatorGroupAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateTranslatorGroupRequest $request): JsonResponse
    {
        $translatorgroup = $this->action->run($request);

        return $this->created($this->transform($translatorgroup, TranslatorGroupTransformer::class));
    }
}
