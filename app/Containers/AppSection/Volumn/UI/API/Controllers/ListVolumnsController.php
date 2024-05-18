<?php

namespace App\Containers\AppSection\Volumn\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Volumn\Actions\ListVolumnsAction;
use App\Containers\AppSection\Volumn\UI\API\Requests\ListVolumnsRequest;
use App\Containers\AppSection\Volumn\UI\API\Transformers\VolumnTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListVolumnsController extends ApiController
{
    public function __construct(
        private readonly ListVolumnsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListVolumnsRequest $request): array
    {
        $volumns = $this->action->run($request);

        return $this->transform($volumns, VolumnTransformer::class);
    }
}
