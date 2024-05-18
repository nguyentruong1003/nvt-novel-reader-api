<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('translator_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('note')->nullable();
            $table->string('slug')->nullable();
            $table->string('user_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translator_groups');
    }
};
