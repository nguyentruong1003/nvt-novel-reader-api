<?php

namespace App\Containers\AppSection\Chapter\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Chapter\Actions\FindChapterByIdAction;
use App\Containers\AppSection\Chapter\UI\API\Requests\FindChapterByIdRequest;
use App\Containers\AppSection\Chapter\UI\API\Transformers\ChapterTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindChapterByIdController extends ApiController
{
    public function __construct(
        private readonly FindChapterByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindChapterByIdRequest $request): array
    {
        $chapter = $this->action->run($request);

        return $this->transform($chapter, ChapterTransformer::class);
    }
}
