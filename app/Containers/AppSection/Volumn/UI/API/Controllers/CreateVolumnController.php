<?php

namespace App\Containers\AppSection\Volumn\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Volumn\Actions\CreateVolumnAction;
use App\Containers\AppSection\Volumn\UI\API\Requests\CreateVolumnRequest;
use App\Containers\AppSection\Volumn\UI\API\Transformers\VolumnTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateVolumnController extends ApiController
{
    public function __construct(
        private readonly CreateVolumnAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateVolumnRequest $request): JsonResponse
    {
        $volumn = $this->action->run($request);

        return $this->created($this->transform($volumn, VolumnTransformer::class));
    }
}
