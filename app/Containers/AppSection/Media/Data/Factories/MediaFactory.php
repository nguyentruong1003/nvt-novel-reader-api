<?php

namespace App\Containers\AppSection\Media\Data\Factories;

use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of MediaFactory
 *
 * @extends ParentFactory<TModel>
 */
class MediaFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
