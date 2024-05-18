<?php

namespace App\Containers\AppSection\Discussion\Data\Factories;

use App\Containers\AppSection\Discussion\Models\Discussion;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of DiscussionFactory
 *
 * @extends ParentFactory<TModel>
 */
class DiscussionFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Discussion::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
