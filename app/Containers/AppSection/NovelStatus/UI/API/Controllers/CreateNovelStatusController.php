<?php

namespace App\Containers\AppSection\NovelStatus\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelStatus\Actions\CreateNovelStatusAction;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\CreateNovelStatusRequest;
use App\Containers\AppSection\NovelStatus\UI\API\Transformers\NovelStatusTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateNovelStatusController extends ApiController
{
    public function __construct(
        private readonly CreateNovelStatusAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateNovelStatusRequest $request): JsonResponse
    {
        $novelstatus = $this->action->run($request);

        return $this->created($this->transform($novelstatus, NovelStatusTransformer::class));
    }
}
