<?php

namespace App\Containers\AppSection\Chapter\Tasks;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Chapter\Data\Repositories\ChapterRepository;
use App\Containers\AppSection\Chapter\Events\ChapterCreatedEvent;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;

class CreateChapterTask extends ParentTask
{
    use HashIdTrait;

    public function __construct(
        protected readonly ChapterRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Chapter
    {
        try {
            $data['user_id'] = Auth::user()->id;
            $data['word_count'] = $data['word_count'] ?? str_word_count($data['content']);
            $chapter = $this->repository->create($data);
            ChapterCreatedEvent::dispatch($chapter);

            $updateData = [
                'slug' => slugCreate($data['title'], $this->encode($chapter->id))
            ];
            $chapter = $this->repository->update($updateData, $chapter->id);

            return $chapter;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
