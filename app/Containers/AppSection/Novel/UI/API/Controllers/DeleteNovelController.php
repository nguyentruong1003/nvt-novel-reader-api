<?php

namespace App\Containers\AppSection\Novel\UI\API\Controllers;

use App\Containers\AppSection\Novel\Actions\DeleteNovelAction;
use App\Containers\AppSection\Novel\UI\API\Requests\DeleteNovelRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteNovelController extends ApiController
{
    public function __construct(
        private readonly DeleteNovelAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteNovelRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
