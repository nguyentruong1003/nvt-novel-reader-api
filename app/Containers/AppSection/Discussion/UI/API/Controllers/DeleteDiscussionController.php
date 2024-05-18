<?php

namespace App\Containers\AppSection\Discussion\UI\API\Controllers;

use App\Containers\AppSection\Discussion\Actions\DeleteDiscussionAction;
use App\Containers\AppSection\Discussion\UI\API\Requests\DeleteDiscussionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteDiscussionController extends ApiController
{
    public function __construct(
        private readonly DeleteDiscussionAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteDiscussionRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
