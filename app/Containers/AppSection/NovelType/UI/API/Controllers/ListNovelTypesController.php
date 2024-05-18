<?php

namespace App\Containers\AppSection\NovelType\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelType\Actions\ListNovelTypesAction;
use App\Containers\AppSection\NovelType\UI\API\Requests\ListNovelTypesRequest;
use App\Containers\AppSection\NovelType\UI\API\Transformers\NovelTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelTypesController extends ApiController
{
    public function __construct(
        private readonly ListNovelTypesAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListNovelTypesRequest $request): array
    {
        $noveltypes = $this->action->run($request);

        return $this->transform($noveltypes, NovelTypeTransformer::class);
    }
}
