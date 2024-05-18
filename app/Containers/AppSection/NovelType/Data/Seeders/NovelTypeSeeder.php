<?php

namespace App\Containers\AppSection\NovelType\Data\Seeders;

use App\Containers\AppSection\NovelType\Tasks\CreateNovelTypeTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class NovelTypeSeeder extends ParentSeeder
{
    public function run(): void
    {
        app(CreateNovelTypeTask::class)->run([
            'title' => 'Truyện dịch'
        ]);
        app(CreateNovelTypeTask::class)->run([
            'title' => 'Máy dịch'
        ]);
        app(CreateNovelTypeTask::class)->run([
            'title' => 'Truyện sáng tác'
        ]);
    }
}
