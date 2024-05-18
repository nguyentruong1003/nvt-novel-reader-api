<?php

namespace App\Containers\AppSection\Chapter\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Chapter\Actions\CreateChapterAction;
use App\Containers\AppSection\Chapter\UI\API\Requests\CreateChapterRequest;
use App\Containers\AppSection\Chapter\UI\API\Transformers\ChapterTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateChapterController extends ApiController
{
    public function __construct(
        private readonly CreateChapterAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateChapterRequest $request): JsonResponse
    {
        $chapter = $this->action->run($request);

        return $this->created($this->transform($chapter, ChapterTransformer::class));
    }
}
