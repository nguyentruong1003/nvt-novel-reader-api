<?php

namespace App\Containers\AppSection\Discussion\Models;

use App\Containers\AppSection\Comment\Models\Comment;
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

    public function comments() {
        return $this->hasMany(Comment::class, 'model_id', 'id')->where('comments.model_type', Discussion::class)->whereNull('parent_id');
    }
}
