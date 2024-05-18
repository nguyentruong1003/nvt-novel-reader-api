<?php

namespace App\Containers\AppSection\NovelCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelCategory\Actions\ListNovelCategoriesAction;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\ListNovelCategoriesRequest;
use App\Containers\AppSection\NovelCategory\UI\API\Transformers\NovelCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelCategoriesController extends ApiController
{
    public function __construct(
        private readonly ListNovelCategoriesAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListNovelCategoriesRequest $request): array
    {
        $novelcategories = $this->action->run($request);

        return $this->transform($novelcategories, NovelCategoryTransformer::class);
    }
}
