<?php

namespace App\Containers\AppSection\TranslatorGroup\Data\Factories;

use App\Containers\AppSection\TranslatorGroup\Models\TranslatorGroup;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of TranslatorGroupFactory
 *
 * @extends ParentFactory<TModel>
 */
class TranslatorGroupFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = TranslatorGroup::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
