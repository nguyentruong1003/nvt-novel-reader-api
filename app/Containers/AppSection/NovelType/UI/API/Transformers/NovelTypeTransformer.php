<?php

namespace App\Containers\AppSection\NovelType\UI\API\Transformers;

use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class NovelTypeTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(NovelType $noveltype): array
    {
        $response = [
            'object' => $noveltype->getResourceKey(),
            'id' => $noveltype->getHashedKey(),
            'title' => $noveltype->title,
            'slug' => $noveltype->slug,

            'created_at' => $noveltype->created_at,
            'updated_at' => $noveltype->updated_at,
            'readable_created_at' => $noveltype->created_at->diffForHumans(),
            'readable_updated_at' => $noveltype->updated_at->diffForHumans(),
            'deleted_at' => $noveltype->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $noveltype->id,
        // ], $response);

        return $response;
    }
}
