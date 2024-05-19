<?php

namespace App\Containers\AppSection\Novel\Tasks;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Novel\Data\Repositories\NovelRepository;
use App\Containers\AppSection\Novel\Events\NovelCreatedEvent;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;

class CreateNovelTask extends ParentTask
{
    use HashIdTrait;

    public function __construct(
        protected readonly NovelRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Novel
    {
        try {
            $data['user_id'] = Auth::user()->id;
            $data['status_id'] = $data['status_id'] ?? 1;
            $data['type_id'] = $data['type_id'] ?? 1;
            $novel = $this->repository->create($data);
            
            $updateData = [
                'slug' => slugCreate($data['title'], $this->encode($novel->id))
            ];
            $novel = $this->repository->update($updateData, $novel->id);
            $novel->categories()->sync($data['categories']);
            NovelCreatedEvent::dispatch($novel);

            return $novel;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
