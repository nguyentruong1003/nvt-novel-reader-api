<?php

namespace App\Containers\AppSection\Comment\Tasks;

use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Containers\AppSection\Comment\Data\Repositories\CommentRepository;
use App\Containers\AppSection\Comment\Events\CommentCreatedEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;

class CreateCommentTask extends ParentTask
{
    public function __construct(
        protected readonly CommentRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Comment
    {
        try {
            if (!isset($data['model_type']) || $data['model_type'] == 'novel') $data['model_type'] = Novel::class;
            if (isset($data['model_type']) && $data['model_type'] == 'chapter') $data['model_type'] = Chapter::class;
            if (isset($data['model_type']) && $data['model_type'] == 'discussion') $data['model_type'] = Discussion::class;
            if (isset($data['parent_id'])) {
                $parent = $this->repository->find($data['parent_id']);
                if (isset($parent->parent_id)) $data['parent_id'] = $parent->parent_id;
            }
            $data['user_id'] = Auth::user()->id;
            $comment = $this->repository->create($data);
            CommentCreatedEvent::dispatch($comment);

            return $comment;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
