<?php

namespace App\Containers\AppSection\Discussion\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class DiscussionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
