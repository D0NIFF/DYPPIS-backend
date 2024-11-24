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
        Schema::create('media_storage_categories', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('slug', 100)
                ->unique();

            $table->string('title', 100);

            $table->string('url', 255);

            $table->string('path', 255);
        });

        Schema::create('media_storage', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('file_name', 255)
                ->nullable();

            /* Example: image/jpeg, image/png, video/mp4  */
            $table->string('file_type')
                ->nullable();

            /* In bytes */
            $table->unsignedInteger('file_size')
                ->nullable();

            $table->uuid('category_id')
                ->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('media_storage_categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_storage');
        Schema::dropIfExists('media_storage_categories');
    }
};
