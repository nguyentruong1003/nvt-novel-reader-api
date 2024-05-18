<?php

namespace App\Containers\AppSection\Chapter\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Chapter\Actions\UpdateChapterAction;
use App\Containers\AppSection\Chapter\UI\API\Requests\UpdateChapterRequest;
use App\Containers\AppSection\Chapter\UI\API\Transformers\ChapterTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateChapterController extends ApiController
{
    public function __construct(
        private readonly UpdateChapterAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateChapterRequest $request): array
    {
        $chapter = $this->action->run($request);

        return $this->transform($chapter, ChapterTransformer::class);
    }
}
