<?php

namespace App\Containers\AppSection\Novel\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Containers\AppSection\Novel\Tasks\CreateNovelTask;
use App\Containers\AppSection\Novel\UI\API\Requests\CreateNovelRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateNovelAction extends ParentAction
{
    public function __construct(
        private readonly CreateNovelTask $createNovelTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateNovelRequest $request): Novel
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'user_id',
            'status_id',
            'type_id',
            'other_name',
            'description',
            'author',
            'artist',
            'categories',
            'note'
        ]);

        return $this->createNovelTask->run($data);
    }
}
