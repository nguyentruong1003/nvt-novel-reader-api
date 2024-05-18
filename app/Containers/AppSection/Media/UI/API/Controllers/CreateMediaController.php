<?php

namespace App\Containers\AppSection\Media\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Media\Actions\CreateMediaAction;
use App\Containers\AppSection\Media\UI\API\Requests\CreateMediaRequest;
use App\Containers\AppSection\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateMediaController extends ApiController
{
    public function __construct(
        private readonly CreateMediaAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateMediaRequest $request): JsonResponse
    {
        $media = $this->action->run($request);

        return $this->created($this->transform($media, MediaTransformer::class));
    }
}
