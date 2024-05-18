<?php

namespace App\Containers\AppSection\Novel\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Novel extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Novel';

    protected $fillable = [
        'title',
        'user_id',
        'status_id',
        'type_id',
        'other_name',
        'description',
        'author',
        'artist',
        'slug'
    ];
}
