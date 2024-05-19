<?php

namespace App\Containers\AppSection\Novel\Models;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\Volumn\Models\Volumn;
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
        'slug',
        'note'
    ];

    public function categories() {
        return $this->belongsToMany(NovelCategory::class, 'novel_has_novel_categories', 'novel_id', 'novel_category_id');
    }

    public function type() {
        return $this->hasOne(NovelType::class, 'id', 'type_id');
    }

    public function status() {
        return $this->hasOne(NovelStatus::class, 'id', 'status_id');
    }

    public function owner() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function volumns() {
        return $this->hasMany(Volumn::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'model_id', 'id')->where('comments.model_type', Novel::class)->whereNull('parent_id');
    }

}
