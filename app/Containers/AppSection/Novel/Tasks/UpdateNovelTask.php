<?php

namespace App\Containers\AppSection\Novel\Tasks;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Novel\Data\Repositories\NovelRepository;
use App\Containers\AppSection\Novel\Events\NovelUpdatedEvent;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class UpdateNovelTask extends ParentTask
{
    use HashIdTrait;

    public function __construct(
        protected readonly NovelRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Novel
    {
        try {
            $old_data = $this->repository->find($id);
            if (isset($data['title']) && $data['title'] != $old_data->title) {
                $data['slug'] = slugCreate($data['title'], $this->encode($id));
            }
            $data['user_id'] = $data['user_id'] ?? Auth::user()->id;
            $data['status_id'] = $data['status_id'] ?? 1;
            $data['type_id'] = $data['type_id'] ?? 1;
            $novel = $this->repository->update($data, $id);            
            $novel->categories()->sync($data['categories']);
            NovelUpdatedEvent::dispatch($novel);

            return $novel;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
