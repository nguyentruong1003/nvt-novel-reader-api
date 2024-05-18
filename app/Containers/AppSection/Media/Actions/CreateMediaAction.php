<?php

namespace App\Containers\AppSection\Media\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tasks\CreateMediaTask;
use App\Containers\AppSection\Media\UI\API\Requests\CreateMediaRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateMediaAction extends ParentAction
{
    public function __construct(
        private readonly CreateMediaTask $createMediaTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateMediaRequest $request): Media
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'model_type',
            'model_id',
            'url',
            'file_name',
            'type',
            'size'
        ]);

        return $this->createMediaTask->run($data);
    }
}
