<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status_id')->nullable();
            $table->string('type_id')->nullable();
            $table->text('other_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('author')->nullable();
            $table->string('artist')->nullable();
            $table->string('slug')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('novels');
    }
};
