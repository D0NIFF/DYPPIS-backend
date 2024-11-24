<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('slug', 100)
                ->unique();

            $table->string('title', 150);

            $table->uuid('parent_id')
                ->nullable();

            $table->uuid('image_id')
                ->nullable();
            $table->foreign('image_id')
                ->references('id')
                ->on('media_storage');

            $table->uuid('banner_id')
                ->nullable();
            $table->foreign('banner_id')
                ->references('id')
                ->on('media_storage');

            $table->uuid('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('platform_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platforms');
    }
};
