<?php

namespace App\Containers\AppSection\Volumn\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class VolumnRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
