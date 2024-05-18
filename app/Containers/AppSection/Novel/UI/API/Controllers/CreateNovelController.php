<?php

namespace App\Containers\AppSection\Novel\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Novel\Actions\CreateNovelAction;
use App\Containers\AppSection\Novel\UI\API\Requests\CreateNovelRequest;
use App\Containers\AppSection\Novel\UI\API\Transformers\NovelTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateNovelController extends ApiController
{
    public function __construct(
        private readonly CreateNovelAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateNovelRequest $request): JsonResponse
    {
        $novel = $this->action->run($request);

        return $this->created($this->transform($novel, NovelTransformer::class));
    }
}
