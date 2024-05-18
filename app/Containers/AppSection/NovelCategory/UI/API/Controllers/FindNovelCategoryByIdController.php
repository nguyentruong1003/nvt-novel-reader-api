<?php

namespace App\Containers\AppSection\NovelCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelCategory\Actions\FindNovelCategoryByIdAction;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\FindNovelCategoryByIdRequest;
use App\Containers\AppSection\NovelCategory\UI\API\Transformers\NovelCategoryTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindNovelCategoryByIdController extends ApiController
{
    public function __construct(
        private readonly FindNovelCategoryByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindNovelCategoryByIdRequest $request): array
    {
        $novelcategory = $this->action->run($request);

        return $this->transform($novelcategory, NovelCategoryTransformer::class);
    }
}
