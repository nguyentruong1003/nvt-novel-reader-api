<?php

namespace App\Containers\AppSection\Novel\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Novel\Actions\FindNovelByIdAction;
use App\Containers\AppSection\Novel\UI\API\Requests\FindNovelByIdRequest;
use App\Containers\AppSection\Novel\UI\API\Transformers\NovelTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindNovelByIdController extends ApiController
{
    public function __construct(
        private readonly FindNovelByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindNovelByIdRequest $request): array
    {
        $novel = $this->action->run($request);

        return $this->transform($novel, NovelTransformer::class);
    }
}
