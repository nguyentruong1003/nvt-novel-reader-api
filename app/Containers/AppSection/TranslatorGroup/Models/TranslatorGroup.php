<?php

namespace App\Containers\AppSection\TranslatorGroup\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class TranslatorGroup extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'TranslatorGroup';

    protected $fillable = [
        'name',
        'note',
        'slug',
        'user_id'
    ];
}
