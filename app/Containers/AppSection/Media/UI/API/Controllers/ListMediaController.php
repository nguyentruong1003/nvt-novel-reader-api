<?php

namespace App\Containers\AppSection\Media\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Media\Actions\ListMediaAction;
use App\Containers\AppSection\Media\UI\API\Requests\ListMediaRequest;
use App\Containers\AppSection\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListMediaController extends ApiController
{
    public function __construct(
        private readonly ListMediaAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListMediaRequest $request): array
    {
        $media = $this->action->run($request);

        return $this->transform($media, MediaTransformer::class);
    }
}
