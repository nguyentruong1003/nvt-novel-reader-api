<?php

namespace App\Containers\AppSection\TranslatorGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TranslatorGroup\Actions\ListTranslatorGroupsAction;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\ListTranslatorGroupsRequest;
use App\Containers\AppSection\TranslatorGroup\UI\API\Transformers\TranslatorGroupTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTranslatorGroupsController extends ApiController
{
    public function __construct(
        private readonly ListTranslatorGroupsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListTranslatorGroupsRequest $request): array
    {
        $translatorgroups = $this->action->run($request);

        return $this->transform($translatorgroups, TranslatorGroupTransformer::class);
    }
}
