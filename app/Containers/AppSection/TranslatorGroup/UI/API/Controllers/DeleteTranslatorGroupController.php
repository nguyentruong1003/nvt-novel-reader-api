<?php

namespace App\Containers\AppSection\TranslatorGroup\UI\API\Controllers;

use App\Containers\AppSection\TranslatorGroup\Actions\DeleteTranslatorGroupAction;
use App\Containers\AppSection\TranslatorGroup\UI\API\Requests\DeleteTranslatorGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteTranslatorGroupController extends ApiController
{
    public function __construct(
        private readonly DeleteTranslatorGroupAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteTranslatorGroupRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
