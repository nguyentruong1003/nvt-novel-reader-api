<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Comment\Actions\UpdateCommentAction;
use App\Containers\AppSection\Comment\UI\API\Requests\UpdateCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCommentController extends ApiController
{
    public function __construct(
        private readonly UpdateCommentAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateCommentRequest $request): array
    {
        $comment = $this->action->run($request);

        return $this->transform($comment, CommentTransformer::class);
    }
}
