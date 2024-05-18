<?php

namespace App\Containers\AppSection\TranslatorGroup\Tasks;

use App\Containers\AppSection\TranslatorGroup\Data\Repositories\TranslatorGroupRepository;
use App\Containers\AppSection\TranslatorGroup\Events\TranslatorGroupCreatedEvent;
use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateTranslatorGroupTask extends ParentTask
{
    public function __construct(
        protected readonly TranslatorGroupRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): TranslatorGroup
    {
        try {
            $translatorgroup = $this->repository->create($data);
            TranslatorGroupCreatedEvent::dispatch($translatorgroup);

            return $translatorgroup;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
