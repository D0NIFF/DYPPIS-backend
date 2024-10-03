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
            $table->uuid()
                ->primary();

            $table->string('title');

            $table->string('iso_code')
                ->unique();

            $table->string('iso_code_2')
                ->unique();

            $table->uuid('currency_uuid');
            $table->foreign('currency_uuid')
                ->references('uuid')
                ->on('currencies');

            $table->uuid('language_uuid');
            $table->foreign('language_uuid')
                ->references('uuid')
                ->on('languages');
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
