<?php

namespace App\Containers\AppSection\NovelStatus\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelStatus\Actions\FindNovelStatusByIdAction;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\FindNovelStatusByIdRequest;
use App\Containers\AppSection\NovelStatus\UI\API\Transformers\NovelStatusTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindNovelStatusByIdController extends ApiController
{
    public function __construct(
        private readonly FindNovelStatusByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindNovelStatusByIdRequest $request): array
    {
        $novelstatus = $this->action->run($request);

        return $this->transform($novelstatus, NovelStatusTransformer::class);
    }
}
