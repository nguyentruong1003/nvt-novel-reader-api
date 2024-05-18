<?php

namespace App\Containers\AppSection\Chapter\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChapterTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Chapter $chapter): array
    {
        $response = [
            'object' => $chapter->getResourceKey(),
            'id' => $chapter->getHashedKey(),
            'volumn_id' => $this->encode($chapter->volumn_id),
            'content' => $chapter->content,
            'word_count' => $chapter->word_count,
            'slug' => $chapter->slug,
            'user_id' => $this->encode($chapter->user_id),

            'created_at' => $chapter->created_at,
            'updated_at' => $chapter->updated_at,
            'readable_created_at' => $chapter->created_at->diffForHumans(),
            'readable_updated_at' => $chapter->updated_at->diffForHumans(),
            'deleted_at' => $chapter->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $chapter->id,
        // ], $response);

        return $response;
    }
}
