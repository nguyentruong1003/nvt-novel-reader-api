<?php

namespace App\Containers\AppSection\TranslatorGroup\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TranslatorGroupTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(TranslatorGroup $translatorgroup): array
    {
        $response = [
            'object' => $translatorgroup->getResourceKey(),
            'id' => $translatorgroup->getHashedKey(),
            'name' => $translatorgroup->name,
            'note' => $translatorgroup->note,
            'slug' => $translatorgroup->slug,
            'user_id' => $this->encode($translatorgroup->user_id),
            
            'created_at' => $translatorgroup->created_at,
            'updated_at' => $translatorgroup->updated_at,
            'readable_created_at' => $translatorgroup->created_at->diffForHumans(),
            'readable_updated_at' => $translatorgroup->updated_at->diffForHumans(),
            'deleted_at' => $translatorgroup->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $translatorgroup->id,
        // ], $response);

        return $response;
    }
}
