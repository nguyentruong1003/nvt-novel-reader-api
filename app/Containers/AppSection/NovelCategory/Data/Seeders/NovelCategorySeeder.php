<?php

namespace App\Containers\AppSection\NovelCategory\Data\Seeders;

use App\Containers\AppSection\NovelCategory\Models\NovelCategory;
use App\Containers\AppSection\NovelCategory\Tasks\CreateNovelCategoryTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class NovelCategorySeeder extends ParentSeeder
{
    public function run(): void
    {
        $data = require_once(database_path('raw/NovelCategoryData.php'));
        NovelCategory::query()->truncate();
        foreach($data as $value){
            app(CreateNovelCategoryTask::class)->run($value);
        }
    }
}
