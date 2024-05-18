<?php

namespace App\Containers\AppSection\Chapter\Tasks;

use App\Containers\AppSection\Chapter\Data\Repositories\ChapterRepository;
use App\Containers\AppSection\Chapter\Events\ChapterFoundByIdEvent;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindChapterByIdTask extends ParentTask
{
    public function __construct(
        protected readonly ChapterRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Chapter
    {
        try {
            $chapter = $this->repository->find($id);
            ChapterFoundByIdEvent::dispatch($chapter);

            return $chapter;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
