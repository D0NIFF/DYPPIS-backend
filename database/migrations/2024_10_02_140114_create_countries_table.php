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
        Schema::create('countries', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('title');

            $table->string('title_en')
                ->nullable();

            $table->string('iso_code')
                ->unique();

            $table->string('iso_code_2')
                ->unique()
                ->nullable();

            $table->uuid('currency_id');
            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies');

            $table->uuid('language_id');
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');

            $table->uuid('image_id');
            $table->foreign('image_id')
                ->references('id')
                ->on('media_storage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
