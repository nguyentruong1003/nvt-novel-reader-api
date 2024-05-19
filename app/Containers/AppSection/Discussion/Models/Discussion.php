<?php

namespace App\Containers\AppSection\Discussion\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Discussion extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Discussion';

    protected $fillable = [
        'title',
        'content',
        'type',
        'novel_id',
        'user_id',
        'slug'
    ];
}
