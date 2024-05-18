<?php

namespace App\Containers\AppSection\NovelType\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\NovelType\Actions\FindNovelTypeByIdAction;
use App\Containers\AppSection\NovelType\UI\API\Requests\FindNovelTypeByIdRequest;
use App\Containers\AppSection\NovelType\UI\API\Transformers\NovelTypeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindNovelTypeByIdController extends ApiController
{
    public function __construct(
        private readonly FindNovelTypeByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindNovelTypeByIdRequest $request): array
    {
        $noveltype = $this->action->run($request);

        return $this->transform($noveltype, NovelTypeTransformer::class);
    }
}
