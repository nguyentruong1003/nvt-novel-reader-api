<?php

namespace App\Containers\AppSection\Volumn\UI\API\Controllers;

use App\Containers\AppSection\Volumn\Actions\DeleteVolumnAction;
use App\Containers\AppSection\Volumn\UI\API\Requests\DeleteVolumnRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteVolumnController extends ApiController
{
    public function __construct(
        private readonly DeleteVolumnAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteVolumnRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
