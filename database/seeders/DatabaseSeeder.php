<?php

namespace Database\Seeders;

use Apiato\Core\Loaders\SeederLoaderTrait;
use App\Containers\AppSection\NovelCategory\Data\Seeders\NovelCategorySeeder;
use App\Containers\AppSection\NovelStatus\Data\Seeders\NovelStatusSeeder;
use App\Containers\AppSection\NovelType\Data\Seeders\NovelTypeSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use SeederLoaderTrait;

    public function run(): void
    {
        $this->runLoadingSeeders();
        // $this->call([
        //     NovelTypeSeeder::class,
        //     NovelStatusSeeder::class,
        //     NovelCategorySeeder::class
        // ]);
    }
}
