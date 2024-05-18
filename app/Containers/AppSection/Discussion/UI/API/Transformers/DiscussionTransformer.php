<?php

namespace App\Containers\AppSection\Discussion\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DiscussionTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Discussion $discussion): array
    {
        $response = [
            'object' => $discussion->getResourceKey(),
            'id' => $discussion->getHashedKey(),
            'title' => $discussion->title,
            'content' => $discussion->content,
            'type' => $discussion->type,
            'novel_id' => $this->encode($discussion->novel_id),
            'user_id' => $this->encode($discussion->user_id),

            'created_at' => $discussion->created_at,
            'updated_at' => $discussion->updated_at,
            'readable_created_at' => $discussion->created_at->diffForHumans(),
            'readable_updated_at' => $discussion->updated_at->diffForHumans(),
            'deleted_at' => $discussion->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $discussion->id,
        // ], $response);

        return $response;
    }
}
