<?php

namespace App\Containers\AppSection\Volumn\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Volumn\Actions\UpdateVolumnAction;
use App\Containers\AppSection\Volumn\UI\API\Requests\UpdateVolumnRequest;
use App\Containers\AppSection\Volumn\UI\API\Transformers\VolumnTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateVolumnController extends ApiController
{
    public function __construct(
        private readonly UpdateVolumnAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateVolumnRequest $request): array
    {
        $volumn = $this->action->run($request);

        return $this->transform($volumn, VolumnTransformer::class);
    }
}
