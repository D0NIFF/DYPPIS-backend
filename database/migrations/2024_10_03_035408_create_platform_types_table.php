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
        Schema::create('platform_types', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('slug', 100)
                ->unique();

            $table->jsonb('title');

            $table->string('img', 150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platform_types');
    }
};
