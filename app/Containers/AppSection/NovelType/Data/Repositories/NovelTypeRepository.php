<?php

namespace App\Containers\AppSection\NovelType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class NovelTypeRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
