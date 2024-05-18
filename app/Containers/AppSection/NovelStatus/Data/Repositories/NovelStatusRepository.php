<?php

namespace App\Containers\AppSection\NovelStatus\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class NovelStatusRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
