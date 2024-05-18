<?php

namespace App\Containers\AppSection\NovelStatus\Data\Seeders;

use App\Containers\AppSection\NovelStatus\Tasks\CreateNovelStatusTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class NovelStatusSeeder extends ParentSeeder
{
    public function run(): void
    {
        app(CreateNovelStatusTask::class)->run([
            'title' => 'Đang tiến hành'
        ]);
        app(CreateNovelStatusTask::class)->run([
            'title' => 'Tạm ngưng'
        ]);
        app(CreateNovelStatusTask::class)->run([
            'title' => 'Đã hoàn thành'
        ]);
    }
}
