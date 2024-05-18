<?php

namespace App\Containers\AppSection\Comment\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Comment extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Comment';

    protected $fillable = [
        'content',
        'user_id',
        'model_type',
        'model_id',
        'parent_id'
    ];
}
