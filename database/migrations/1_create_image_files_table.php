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
        Schema::create('image_files', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('file_name')
                ->nullable();
            $table->string('file_path')
                ->nullable();
            $table->string('file_url')
                ->nullable();
            $table->string('file_type')
                ->nullable();
            $table->string('file_size')
                ->nullable();

            $table->timestamp('created_at')
                ->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_files');
    }
};
