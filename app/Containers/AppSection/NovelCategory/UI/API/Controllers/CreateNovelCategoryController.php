<?php

namespace App\Containers\AppSection\NovelCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelCategory\Actions\CreateNovelCategoryAction;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\CreateNovelCategoryRequest;
use App\Containers\AppSection\NovelCategory\UI\API\Transformers\NovelCategoryTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateNovelCategoryController extends ApiController
{
    public function __construct(
        private readonly CreateNovelCategoryAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateNovelCategoryRequest $request): JsonResponse
    {
        $novelcategory = $this->action->run($request);

        return $this->created($this->transform($novelcategory, NovelCategoryTransformer::class));
    }
}
