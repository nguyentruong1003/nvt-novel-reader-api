<?php

namespace App\Containers\AppSection\Chapter\UI\API\Controllers;

use App\Containers\AppSection\Chapter\Actions\DeleteChapterAction;
use App\Containers\AppSection\Chapter\UI\API\Requests\DeleteChapterRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteChapterController extends ApiController
{
    public function __construct(
        private readonly DeleteChapterAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteChapterRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
