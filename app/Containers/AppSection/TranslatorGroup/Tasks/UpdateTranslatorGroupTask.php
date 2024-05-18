<?php

namespace App\Containers\AppSection\TranslatorGroup\Tasks;

use App\Containers\AppSection\TranslatorGroup\Data\Repositories\TranslatorGroupRepository;
use App\Containers\AppSection\TranslatorGroup\Events\TranslatorGroupUpdatedEvent;
use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateTranslatorGroupTask extends ParentTask
{
    public function __construct(
        protected readonly TranslatorGroupRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): TranslatorGroup
    {
        try {
            $translatorgroup = $this->repository->update($data, $id);
            TranslatorGroupUpdatedEvent::dispatch($translatorgroup);

            return $translatorgroup;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
