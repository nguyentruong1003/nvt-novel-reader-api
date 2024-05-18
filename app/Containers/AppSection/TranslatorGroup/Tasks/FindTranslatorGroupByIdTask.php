<?php

namespace App\Containers\AppSection\TranslatorGroup\Tasks;

use App\Containers\AppSection\TranslatorGroup\Data\Repositories\TranslatorGroupRepository;
use App\Containers\AppSection\TranslatorGroup\Events\TranslatorGroupFoundByIdEvent;
use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindTranslatorGroupByIdTask extends ParentTask
{
    public function __construct(
        protected readonly TranslatorGroupRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): TranslatorGroup
    {
        try {
            $translatorgroup = $this->repository->find($id);
            TranslatorGroupFoundByIdEvent::dispatch($translatorgroup);

            return $translatorgroup;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
