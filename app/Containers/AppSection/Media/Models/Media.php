<?php

namespace App\Containers\AppSection\Media\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Media extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Media';

    protected $fillable = [
        'model_type',
        'model_id',
        'url',
        'file_name',
        'type',
        'size'
    ];
}
