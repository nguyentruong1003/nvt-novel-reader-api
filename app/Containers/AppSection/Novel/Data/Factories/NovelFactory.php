<?php

namespace App\Containers\AppSection\Novel\Data\Factories;

use App\Containers\AppSection\Novel\Models\Novel;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of NovelFactory
 *
 * @extends ParentFactory<TModel>
 */
class NovelFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Novel::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
