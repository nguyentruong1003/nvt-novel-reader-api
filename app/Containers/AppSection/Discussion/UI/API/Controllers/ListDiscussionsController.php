<?php

namespace App\Containers\AppSection\Discussion\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Discussion\Actions\ListDiscussionsAction;
use App\Containers\AppSection\Discussion\UI\API\Requests\ListDiscussionsRequest;
use App\Containers\AppSection\Discussion\UI\API\Transformers\DiscussionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListDiscussionsController extends ApiController
{
    public function __construct(
        private readonly ListDiscussionsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListDiscussionsRequest $request): array
    {
        $discussions = $this->action->run($request);

        return $this->transform($discussions, DiscussionTransformer::class);
    }
}
