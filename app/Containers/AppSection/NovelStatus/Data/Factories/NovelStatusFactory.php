<?php

namespace App\Containers\AppSection\NovelStatus\Data\Factories;

use App\Containers\AppSection\NovelStatus\Models\NovelStatus;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of NovelStatusFactory
 *
 * @extends ParentFactory<TModel>
 */
class NovelStatusFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = NovelStatus::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
