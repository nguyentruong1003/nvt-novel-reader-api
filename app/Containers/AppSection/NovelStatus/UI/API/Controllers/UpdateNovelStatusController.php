<?php

namespace App\Containers\AppSection\NovelStatus\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelStatus\Actions\UpdateNovelStatusAction;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\UpdateNovelStatusRequest;
use App\Containers\AppSection\NovelStatus\UI\API\Transformers\NovelStatusTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateNovelStatusController extends ApiController
{
    public function __construct(
        private readonly UpdateNovelStatusAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateNovelStatusRequest $request): array
    {
        $novelstatus = $this->action->run($request);

        return $this->transform($novelstatus, NovelStatusTransformer::class);
    }
}
