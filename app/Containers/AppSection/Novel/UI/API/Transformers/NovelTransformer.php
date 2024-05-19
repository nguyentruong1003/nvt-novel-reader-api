<?php

namespace App\Containers\AppSection\Novel\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Containers\AppSection\NovelCategory\UI\API\Transformers\NovelCategoryTransformer;
use App\Containers\AppSection\Volumn\UI\API\Transformers\VolumnTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class NovelTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [
        // 'categories'
    ];

    protected array $availableIncludes = [
        'volumns'
    ];

    public function transform(Novel $novel): array
    {
        $response = [
            'object' => $novel->getResourceKey(),
            'id' => $novel->getHashedKey(),
            'title' => $novel->title,
            'ower_id' => $this->encode($novel->user_id),
            'owner' => $novel->owner->name,
            'status_id' => $this->encode($novel->status_id),
            'status' => $novel->status->title,
            'type_id' => $this->encode($novel->type_id),
            'type' => $novel->type->title,
            'categorylist' => $novel->categories->pluck('title')->toArray(),
            'other_name' => $novel->other_name,
            'description' => $novel->description,
            'author' => $novel->author,
            'artist' => $novel->artist,
            'slug' => $novel->slug,

            'created_at' => $novel->created_at,
            'updated_at' => $novel->updated_at,
            'readable_created_at' => $novel->created_at->diffForHumans(),
            'readable_updated_at' => $novel->updated_at->diffForHumans(),
            'deleted_at' => $novel->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $novel->id,
        // ], $response);

        return $response;
    }

    public function includeCategories(Novel $novel)
    {
        $categories = $novel->categories;
        if (!$categories) return null;
        return $this->collection($categories, new NovelCategoryTransformer());
    }

    public function includeVolumns(Novel $novel)
    {
        $volumns = $novel->volumns;
        if (!$volumns) return null;
        return $this->collection($volumns, new VolumnTransformer());
    }
}
