<?php

namespace App\Containers\AppSection\Discussion\Tasks;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Discussion\Data\Repositories\DiscussionRepository;
use App\Containers\AppSection\Discussion\Events\DiscussionCreatedEvent;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;

class CreateDiscussionTask extends ParentTask
{
    use HashIdTrait;

    public function __construct(
        protected readonly DiscussionRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Discussion
    {
        try {
            $data['user_id'] = Auth::user()->id;
            $discussion = $this->repository->create($data);
            DiscussionCreatedEvent::dispatch($discussion);
            $updateData = [
                'slug' => slugCreate($data['title'], $this->encode($discussion->id))
            ];
            $discussion = $this->repository->update($updateData, $discussion->id);

            return $discussion;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
