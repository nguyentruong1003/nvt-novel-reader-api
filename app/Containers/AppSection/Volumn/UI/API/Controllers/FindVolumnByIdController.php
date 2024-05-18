<?php

namespace App\Containers\AppSection\Volumn\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Volumn\Actions\FindVolumnByIdAction;
use App\Containers\AppSection\Volumn\UI\API\Requests\FindVolumnByIdRequest;
use App\Containers\AppSection\Volumn\UI\API\Transformers\VolumnTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindVolumnByIdController extends ApiController
{
    public function __construct(
        private readonly FindVolumnByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindVolumnByIdRequest $request): array
    {
        $volumn = $this->action->run($request);

        return $this->transform($volumn, VolumnTransformer::class);
    }
}
