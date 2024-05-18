<?php

namespace App\Containers\AppSection\Chapter\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChapterRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
