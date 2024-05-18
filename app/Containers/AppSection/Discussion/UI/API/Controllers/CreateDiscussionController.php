<?php

namespace App\Containers\AppSection\Discussion\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Discussion\Actions\CreateDiscussionAction;
use App\Containers\AppSection\Discussion\UI\API\Requests\CreateDiscussionRequest;
use App\Containers\AppSection\Discussion\UI\API\Transformers\DiscussionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateDiscussionController extends ApiController
{
    public function __construct(
        private readonly CreateDiscussionAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateDiscussionRequest $request): JsonResponse
    {
        $discussion = $this->action->run($request);

        return $this->created($this->transform($discussion, DiscussionTransformer::class));
    }
}
