<?php

namespace App\Containers\AppSection\NovelStatus\UI\API\Transformers;

use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class NovelStatusTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(NovelStatus $novelstatus): array
    {
        $response = [
            'object' => $novelstatus->getResourceKey(),
            'id' => $novelstatus->getHashedKey(),
            'title' => $novelstatus->title,
            'slug' => $novelstatus->slug,

            'created_at' => $novelstatus->created_at,
            'updated_at' => $novelstatus->updated_at,
            'readable_created_at' => $novelstatus->created_at->diffForHumans(),
            'readable_updated_at' => $novelstatus->updated_at->diffForHumans(),
            'deleted_at' => $novelstatus->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $novelstatus->id,
        // ], $response);

        return $response;
    }
}
