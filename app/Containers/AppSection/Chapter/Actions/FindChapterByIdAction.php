<?php

namespace App\Containers\AppSection\Chapter\Actions;

use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Containers\AppSection\Chapter\Tasks\FindChapterByIdTask;
use App\Containers\AppSection\Chapter\UI\API\Requests\FindChapterByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindChapterByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindChapterByIdTask $findChapterByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindChapterByIdRequest $request): Chapter
    {
        return $this->findChapterByIdTask->run($request->id);
    }
}
