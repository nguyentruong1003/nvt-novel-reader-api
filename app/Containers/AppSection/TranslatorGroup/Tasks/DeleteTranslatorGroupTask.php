<?php

namespace App\Containers\AppSection\TranslatorGroup\Tasks;

use App\Containers\AppSection\TranslatorGroup\Data\Repositories\TranslatorGroupRepository;
use App\Containers\AppSection\TranslatorGroup\Events\TranslatorGroupDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteTranslatorGroupTask extends ParentTask
{
    public function __construct(
        protected readonly TranslatorGroupRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            TranslatorGroupDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
