<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Comment\Actions\ListCommentsAction;
use App\Containers\AppSection\Comment\UI\API\Requests\ListCommentsRequest;
use App\Containers\AppSection\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCommentsController extends ApiController
{
    public function __construct(
        private readonly ListCommentsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListCommentsRequest $request): array
    {
        $comments = $this->action->run($request);

        return $this->transform($comments, CommentTransformer::class);
    }
}
