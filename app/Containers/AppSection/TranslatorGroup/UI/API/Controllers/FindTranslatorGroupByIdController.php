<?php

namespace App\Containers\AppSection\TranslatorGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TranslatorGroup\Actions\FindTranslatorGroupByIdAction;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\FindTranslatorGroupByIdRequest;
use App\Containers\AppSection\TranslatorGroup\UI\API\Transformers\TranslatorGroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindTranslatorGroupByIdController extends ApiController
{
    public function __construct(
        private readonly FindTranslatorGroupByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindTranslatorGroupByIdRequest $request): array
    {
        $translatorgroup = $this->action->run($request);

        return $this->transform($translatorgroup, TranslatorGroupTransformer::class);
    }
}
