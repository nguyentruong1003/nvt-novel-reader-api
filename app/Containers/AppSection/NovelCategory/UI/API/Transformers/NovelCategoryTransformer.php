<?php

namespace App\Containers\AppSection\NovelCategory\UI\API\Transformers;

use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class NovelCategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(NovelCategory $novelcategory): array
    {
        $response = [
            'object' => $novelcategory->getResourceKey(),
            'id' => $novelcategory->getHashedKey(),
            'title' => $novelcategory->title,
            'description' => $novelcategory->description,
            'slug' => $novelcategory->slug,

            'created_at' => $novelcategory->created_at,
            'updated_at' => $novelcategory->updated_at,
            'readable_created_at' => $novelcategory->created_at->diffForHumans(),
            'readable_updated_at' => $novelcategory->updated_at->diffForHumans(),
            'deleted_at' => $novelcategory->deleted_at,
        ];

        // $response = $this->ifAdmin([
        //     'real_id' => $novelcategory->id,
        //     'created_at' => $novelcategory->created_at,
        //     'updated_at' => $novelcategory->updated_at,
        //     'readable_created_at' => $novelcategory->created_at->diffForHumans(),
        //     'readable_updated_at' => $novelcategory->updated_at->diffForHumans(),
        //     'deleted_at' => $novelcategory->deleted_at,
        // ], $response);

        return $response;
    }
}
