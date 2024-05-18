<?php

namespace App\Containers\AppSection\Volumn\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Containers\AppSection\Volumn\Tasks\UpdateVolumnTask;
use App\Containers\AppSection\Volumn\UI\API\Requests\UpdateVolumnRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateVolumnAction extends ParentAction
{
    public function __construct(
        private readonly UpdateVolumnTask $updateVolumnTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateVolumnRequest $request): Volumn
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'novel_id',
            'title',
            'slug'
        ]);

        return $this->updateVolumnTask->run($data, $request->id);
    }
}
