<?php

namespace App\Containers\AppSection\Novel\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Containers\AppSection\Novel\Tasks\UpdateNovelTask;
use App\Containers\AppSection\Novel\UI\API\Requests\UpdateNovelRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateNovelAction extends ParentAction
{
    public function __construct(
        private readonly UpdateNovelTask $updateNovelTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateNovelRequest $request): Novel
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
            'categories'
        ]);

        return $this->updateNovelTask->run($data, $request->id);
    }
}
