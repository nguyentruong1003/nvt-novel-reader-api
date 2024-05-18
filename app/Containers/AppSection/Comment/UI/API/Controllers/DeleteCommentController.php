<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use App\Containers\AppSection\Comment\Actions\DeleteCommentAction;
use App\Containers\AppSection\Comment\UI\API\Requests\DeleteCommentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCommentController extends ApiController
{
    public function __construct(
        private readonly DeleteCommentAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteCommentRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
