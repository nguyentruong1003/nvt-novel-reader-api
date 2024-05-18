<?php

namespace App\Containers\AppSection\TranslatorGroup\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TranslatorGroupRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
