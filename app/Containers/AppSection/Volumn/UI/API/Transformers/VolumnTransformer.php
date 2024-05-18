<?php

namespace App\Containers\AppSection\Volumn\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class VolumnTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Volumn $volumn): array
    {
        $response = [
            'object' => $volumn->getResourceKey(),
            'id' => $volumn->getHashedKey(),
            'novel_id' => $this->encode($volumn->novel_id),
            'title' => $volumn->title,
            'slug' => $volumn->slug,

            'created_at' => $volumn->created_at,
            'updated_at' => $volumn->updated_at,
            'readable_created_at' => $volumn->created_at->diffForHumans(),
            'readable_updated_at' => $volumn->updated_at->diffForHumans(),
            'deleted_at' => $volumn->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $volumn->id,
        // ], $response);

        return $response;
    }
}
