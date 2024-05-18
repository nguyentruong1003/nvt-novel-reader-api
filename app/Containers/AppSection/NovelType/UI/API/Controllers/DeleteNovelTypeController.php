<?php

namespace App\Containers\AppSection\NovelType\UI\API\Controllers;

use App\Containers\AppSection\NovelType\Actions\DeleteNovelTypeAction;
use App\Containers\AppSection\NovelType\UI\API\Requests\DeleteNovelTypeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteNovelTypeController extends ApiController
{
    public function __construct(
        private readonly DeleteNovelTypeAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteNovelTypeRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
