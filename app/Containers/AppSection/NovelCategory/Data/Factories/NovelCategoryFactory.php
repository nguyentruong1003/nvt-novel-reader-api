<?php

namespace App\Containers\AppSection\NovelCategory\Data\Factories;

use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of NovelCategoryFactory
 *
 * @extends ParentFactory<TModel>
 */
class NovelCategoryFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = NovelCategory::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
