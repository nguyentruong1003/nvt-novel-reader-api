<?php

namespace App\Containers\AppSection\NovelType\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelType\Actions\UpdateNovelTypeAction;
use App\Containers\AppSection\NovelType\UI\API\Requests\UpdateNovelTypeRequest;
use App\Containers\AppSection\NovelType\UI\API\Transformers\NovelTypeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateNovelTypeController extends ApiController
{
    public function __construct(
        private readonly UpdateNovelTypeAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateNovelTypeRequest $request): array
    {
        $noveltype = $this->action->run($request);

        return $this->transform($noveltype, NovelTypeTransformer::class);
    }
}
