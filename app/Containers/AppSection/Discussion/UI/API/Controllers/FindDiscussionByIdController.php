<?php

namespace App\Containers\AppSection\Discussion\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Discussion\Actions\FindDiscussionByIdAction;
use App\Containers\AppSection\Discussion\UI\API\Requests\FindDiscussionByIdRequest;
use App\Containers\AppSection\Discussion\UI\API\Transformers\DiscussionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindDiscussionByIdController extends ApiController
{
    public function __construct(
        private readonly FindDiscussionByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindDiscussionByIdRequest $request): array
    {
        $discussion = $this->action->run($request);

        return $this->transform($discussion, DiscussionTransformer::class);
    }
}
