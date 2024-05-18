<?php

namespace App\Containers\AppSection\Novel\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Novel\Actions\UpdateNovelAction;
use App\Containers\AppSection\Novel\UI\API\Requests\UpdateNovelRequest;
use App\Containers\AppSection\Novel\UI\API\Transformers\NovelTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateNovelController extends ApiController
{
    public function __construct(
        private readonly UpdateNovelAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateNovelRequest $request): array
    {
        $novel = $this->action->run($request);

        return $this->transform($novel, NovelTransformer::class);
    }
}
