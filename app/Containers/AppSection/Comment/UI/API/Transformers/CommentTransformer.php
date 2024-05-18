<?php

namespace App\Containers\AppSection\Comment\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CommentTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Comment $comment): array
    {
        $response = [
            'object' => $comment->getResourceKey(),
            'id' => $comment->getHashedKey(),
            'content' => $comment->content,
            'user_id' => $this->encode($comment->user_id),
            'model_type' => $comment->model_type,
            'model_id' => $this->encode($comment->model_id),
            'parent_id' => $this->encode($comment->parent_id),
            
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at,
            'readable_created_at' => $comment->created_at->diffForHumans(),
            'readable_updated_at' => $comment->updated_at->diffForHumans(),
            'deleted_at' => $comment->deleted_at,
        ];

        // return $this->ifAdmin([
        //     'real_id' => $comment->id,
        // ], $response);

        return $response;
    }
}
