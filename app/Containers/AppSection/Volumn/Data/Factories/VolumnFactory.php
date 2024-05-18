<?php

namespace App\Containers\AppSection\Volumn\Data\Factories;

use App\Containers\AppSection\Volumn\Models\Volumn;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of VolumnFactory
 *
 * @extends ParentFactory<TModel>
 */
class VolumnFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Volumn::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
