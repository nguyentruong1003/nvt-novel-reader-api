<?php

namespace App\Containers\AppSection\Discussion\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Discussion\Actions\UpdateDiscussionAction;
use App\Containers\AppSection\Discussion\UI\API\Requests\UpdateDiscussionRequest;
use App\Containers\AppSection\Discussion\UI\API\Transformers\DiscussionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateDiscussionController extends ApiController
{
    public function __construct(
        private readonly UpdateDiscussionAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateDiscussionRequest $request): array
    {
        $discussion = $this->action->run($request);

        return $this->transform($discussion, DiscussionTransformer::class);
    }
}
