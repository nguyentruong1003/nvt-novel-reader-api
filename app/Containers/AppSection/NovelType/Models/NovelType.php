<?php

namespace App\Containers\AppSection\NovelType\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class NovelType extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'NovelType';

    protected $fillable = [
        'title',
        'slug'
    ];
}
