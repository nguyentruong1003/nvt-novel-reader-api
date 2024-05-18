<?php

namespace App\Containers\AppSection\Volumn\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Containers\AppSection\Volumn\Tasks\CreateVolumnTask;
use App\Containers\AppSection\Volumn\UI\API\Requests\CreateVolumnRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateVolumnAction extends ParentAction
{
    public function __construct(
        private readonly CreateVolumnTask $createVolumnTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateVolumnRequest $request): Volumn
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'novel_id',
            'title',
            'slug'
        ]);

        return $this->createVolumnTask->run($data);
    }
}
