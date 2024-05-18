<?php

namespace App\Containers\AppSection\NovelStatus\Actions;

use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Containers\AppSection\NovelStatus\Tasks\FindNovelStatusByIdTask;
use App\Containers\AppSection\NovelStatus\UI\API\Requests\FindNovelStatusByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindNovelStatusByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindNovelStatusByIdTask $findNovelStatusByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindNovelStatusByIdRequest $request): NovelStatus
    {
        return $this->findNovelStatusByIdTask->run($request->id);
    }
}
