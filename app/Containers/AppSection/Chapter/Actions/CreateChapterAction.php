<?php

namespace App\Containers\AppSection\Chapter\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Containers\AppSection\Chapter\Tasks\CreateChapterTask;
use App\Containers\AppSection\Chapter\UI\API\Requests\CreateChapterRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateChapterAction extends ParentAction
{
    public function __construct(
        private readonly CreateChapterTask $createChapterTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChapterRequest $request): Chapter
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'volumn_id',
            'content',
            'word_count',
            'user_id',
            'title'
        ]);

        return $this->createChapterTask->run($data);
    }
}
