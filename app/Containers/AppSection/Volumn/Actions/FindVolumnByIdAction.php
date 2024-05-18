<?php

namespace App\Containers\AppSection\Volumn\Actions;

use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Containers\AppSection\Volumn\Tasks\FindVolumnByIdTask;
use App\Containers\AppSection\Volumn\UI\API\Requests\FindVolumnByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindVolumnByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindVolumnByIdTask $findVolumnByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindVolumnByIdRequest $request): Volumn
    {
        return $this->findVolumnByIdTask->run($request->id);
    }
}
