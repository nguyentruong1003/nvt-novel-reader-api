<?php

namespace App\Containers\AppSection\Chapter\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Containers\AppSection\Chapter\Tasks\UpdateChapterTask;
use App\Containers\AppSection\Chapter\UI\API\Requests\UpdateChapterRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChapterAction extends ParentAction
{
    public function __construct(
        private readonly UpdateChapterTask $updateChapterTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateChapterRequest $request): Chapter
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'volumn_id',
            'content',
            'word_count',
            'slug',
            'user_id'
        ]);

        return $this->updateChapterTask->run($data, $request->id);
    }
}
