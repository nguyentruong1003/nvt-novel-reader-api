<?php

namespace App\Containers\AppSection\Novel\Actions;

use App\Containers\AppSection\Novel\Models\Novel;
use App\Containers\AppSection\Novel\Tasks\FindNovelByIdTask;
use App\Containers\AppSection\Novel\UI\API\Requests\FindNovelByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindNovelByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindNovelByIdTask $findNovelByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindNovelByIdRequest $request): Novel
    {
        return $this->findNovelByIdTask->run($request->id);
    }
}
