<?php

namespace App\Containers\AppSection\Novel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class NovelRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
