<?php

namespace App\Containers\AppSection\NovelStatus\UI\API\Controllers;

use App\Containers\AppSection\NovelStatus\Actions\DeleteNovelStatusAction;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\DeleteNovelStatusRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteNovelStatusController extends ApiController
{
    public function __construct(
        private readonly DeleteNovelStatusAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteNovelStatusRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
