<?php

namespace App\Containers\AppSection\Chapter\Tasks;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Chapter\Data\Repositories\ChapterRepository;
use App\Containers\AppSection\Chapter\Events\ChapterUpdatedEvent;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class UpdateChapterTask extends ParentTask
{
    use HashIdTrait;

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
            $old_data = $this->repository->find($id);
            if (isset($data['title']) && $data['title'] != $old_data->title) {
                $data['slug'] = slugCreate($data['title'], $this->encode($id));
            }
            $data['user_id'] = Auth::user()->id;
            $data['word_count'] = $data['word_count'] ?? str_word_count($data['content']);
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
