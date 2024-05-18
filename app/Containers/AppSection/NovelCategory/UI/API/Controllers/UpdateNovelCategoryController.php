<?php

namespace App\Containers\AppSection\NovelCategory\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelCategory\Actions\UpdateNovelCategoryAction;
use App\Containers\AppSection\NovelCategory\UI\API\Requests\UpdateNovelCategoryRequest;
use App\Containers\AppSection\NovelCategory\UI\API\Transformers\NovelCategoryTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateNovelCategoryController extends ApiController
{
    public function __construct(
        private readonly UpdateNovelCategoryAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateNovelCategoryRequest $request): array
    {
        $novelcategory = $this->action->run($request);

        return $this->transform($novelcategory, NovelCategoryTransformer::class);
    }
}
