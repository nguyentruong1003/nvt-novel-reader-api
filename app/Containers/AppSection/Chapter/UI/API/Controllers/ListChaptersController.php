<?php

namespace App\Containers\AppSection\Chapter\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Chapter\Actions\ListChaptersAction;
use App\Containers\AppSection\Chapter\UI\API\Requests\ListChaptersRequest;
use App\Containers\AppSection\Chapter\UI\API\Transformers\ChapterTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListChaptersController extends ApiController
{
    public function __construct(
        private readonly ListChaptersAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListChaptersRequest $request): array
    {
        $chapters = $this->action->run($request);

        return $this->transform($chapters, ChapterTransformer::class);
    }
}
