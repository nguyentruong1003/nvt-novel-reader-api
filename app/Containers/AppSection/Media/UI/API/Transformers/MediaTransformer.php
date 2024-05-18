<?php

namespace App\Containers\AppSection\Media\UI\API\Transformers;

use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MediaTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Media $media): array
    {
        $response = [
            'object' => $media->getResourceKey(),
            'id' => $media->getHashedKey(),
            'model_type' => $media->model_type,
            'model_id' => $media->model_id,
            'url' => $media->url,
            'file_name' => $media->file_name,
            'type' => $media->type,
            'size' => $media->size,

            'created_at' => $media->created_at,
            'updated_at' => $media->updated_at,
            'readable_created_at' => $media->created_at->diffForHumans(),
            'readable_updated_at' => $media->updated_at->diffForHumans(),
            'deleted_at' => $media->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $media->id,
        // ], $response);

        return $response;
    }
}
