<?php

namespace App\Containers\AppSection\NovelType\Actions;

use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Containers\AppSection\NovelType\Tasks\FindNovelTypeByIdTask;
use App\Containers\AppSection\NovelType\UI\API\Requests\FindNovelTypeByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindNovelTypeByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindNovelTypeByIdTask $findNovelTypeByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindNovelTypeByIdRequest $request): NovelType
    {
        return $this->findNovelTypeByIdTask->run($request->id);
    }
}
