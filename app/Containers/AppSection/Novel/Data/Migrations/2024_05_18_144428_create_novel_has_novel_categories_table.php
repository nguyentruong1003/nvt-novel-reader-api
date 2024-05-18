<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('novel_has_novel_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('novel_id');
            $table->integer('novel_category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('novel_has_novel_categories');
    }
};
