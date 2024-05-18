<?php

namespace App\Containers\AppSection\NovelType\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelType\Actions\CreateNovelTypeAction;
use App\Containers\AppSection\NovelType\UI\API\Requests\CreateNovelTypeRequest;
use App\Containers\AppSection\NovelType\UI\API\Transformers\NovelTypeTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateNovelTypeController extends ApiController
{
    public function __construct(
        private readonly CreateNovelTypeAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateNovelTypeRequest $request): JsonResponse
    {
        $noveltype = $this->action->run($request);

        return $this->created($this->transform($noveltype, NovelTypeTransformer::class));
    }
}
