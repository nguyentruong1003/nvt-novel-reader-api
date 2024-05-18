<?php

namespace App\Containers\AppSection\NovelStatus\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class NovelStatus extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'NovelStatus';
    
    protected $fillable = [
        'title',
        'slug'
    ];
}
