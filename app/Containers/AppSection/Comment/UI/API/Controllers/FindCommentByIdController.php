<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Comment\Actions\FindCommentByIdAction;
use App\Containers\AppSection\Comment\UI\API\Requests\FindCommentByIdRequest;
use App\Containers\AppSection\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCommentByIdController extends ApiController
{
    public function __construct(
        private readonly FindCommentByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindCommentByIdRequest $request): array
    {
        $comment = $this->action->run($request);

        return $this->transform($comment, CommentTransformer::class);
    }
}
