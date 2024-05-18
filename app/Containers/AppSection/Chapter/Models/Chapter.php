<?php

namespace App\Containers\AppSection\Chapter\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Chapter extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Chapter';

    protected $fillable = [
        'volumn_id',
        'content',
        'word_count',
        'slug',
        'user_id'
    ];
}
