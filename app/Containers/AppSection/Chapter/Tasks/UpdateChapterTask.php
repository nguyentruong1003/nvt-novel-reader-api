<?php

namespace App\Containers\AppSection\Chapter\Tasks;

use App\Containers\AppSection\Chapter\Data\Repositories\ChapterRepository;
use App\Containers\AppSection\Chapter\Events\ChapterUpdatedEvent;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateChapterTask extends ParentTask
{
    public function __construct(
        protected readonly ChapterRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Chapter
    {
        try {
            $chapter = $this->repository->update($data, $id);
            ChapterUpdatedEvent::dispatch($chapter);

            return $chapter;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
