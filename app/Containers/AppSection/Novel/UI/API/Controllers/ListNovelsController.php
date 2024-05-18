<?php

namespace App\Containers\AppSection\Novel\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Novel\Actions\ListNovelsAction;
use App\Containers\AppSection\Novel\UI\API\Requests\ListNovelsRequest;
use App\Containers\AppSection\Novel\UI\API\Transformers\NovelTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNovelsController extends ApiController
{
    public function __construct(
        private readonly ListNovelsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListNovelsRequest $request): array
    {
        $novels = $this->action->run($request);

        return $this->transform($novels, NovelTransformer::class);
    }
}
