<?php

namespace App\Containers\AppSection\NovelCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class NovelCategoryRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
