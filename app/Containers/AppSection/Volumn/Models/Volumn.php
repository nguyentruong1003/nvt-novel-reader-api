<?php

namespace App\Containers\AppSection\Volumn\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Volumn extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Volumn';

    protected $fillable = [
        'novel_id',
        'title',
        'slug'
    ];
}
