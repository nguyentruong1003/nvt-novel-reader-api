<?php

namespace App\Containers\AppSection\NovelStatus\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelStatus\Actions\ListNovelStatusesAction;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\ListNovelStatusesRequest;
use App\Containers\AppSection\NovelStatus\UI\API\Transformers\NovelStatusTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelStatusesController extends ApiController
{
    public function __construct(
        private readonly ListNovelStatusesAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListNovelStatusesRequest $request): array
    {
        $novelstatuses = $this->action->run($request);

        return $this->transform($novelstatuses, NovelStatusTransformer::class);
    }
}
