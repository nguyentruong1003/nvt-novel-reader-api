<?php

namespace App\Containers\AppSection\Novel\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class NovelTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Novel $novel): array
    {
        $response = [
            'object' => $novel->getResourceKey(),
            'id' => $novel->getHashedKey(),
            'title' => $novel->title,
            'user_id' => $this->encode($novel->user_id),
            'status_id' => $this->encode($novel->status_id),
            'type_id' => $this->encode($novel->type_id),
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
}
