<?php

namespace App\Containers\AppSection\NovelCategory\UI\API\Controllers;

use App\Containers\AppSection\NovelCategory\Actions\DeleteNovelCategoryAction;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\DeleteNovelCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteNovelCategoryController extends ApiController
{
    public function __construct(
        private readonly DeleteNovelCategoryAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteNovelCategoryRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
