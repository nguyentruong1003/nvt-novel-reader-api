<?php

namespace App\Containers\AppSection\NovelCategory\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class NovelCategory extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'NovelCategory';

    protected $fillable = [
        'title',
        'description',
        'slug'
    ];
}
