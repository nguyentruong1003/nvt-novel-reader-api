<?php

namespace App\Containers\AppSection\NovelType\Data\Factories;

use App\Containers\AppSection\NovelType\Models\NovelType;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of NovelTypeFactory
 *
 * @extends ParentFactory<TModel>
 */
class NovelTypeFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = NovelType::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
