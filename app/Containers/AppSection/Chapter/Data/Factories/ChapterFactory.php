<?php

namespace App\Containers\AppSection\Chapter\Data\Factories;

use App\Containers\AppSection\Chapter\Models\Chapter;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of ChapterFactory
 *
 * @extends ParentFactory<TModel>
 */
class ChapterFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Chapter::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
