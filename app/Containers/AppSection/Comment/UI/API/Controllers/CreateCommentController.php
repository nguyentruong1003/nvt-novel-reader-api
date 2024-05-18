<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Comment\Actions\CreateCommentAction;
use App\Containers\AppSection\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCommentController extends ApiController
{
    public function __construct(
        private readonly CreateCommentAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateCommentRequest $request): JsonResponse
    {
        $comment = $this->action->run($request);

        return $this->created($this->transform($comment, CommentTransformer::class));
    }
}
