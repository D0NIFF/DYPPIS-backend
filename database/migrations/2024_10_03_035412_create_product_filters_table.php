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
        Schema::create('product_filters', function (Blueprint $table) {
            $table->uuid('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories');

            $table->uuid('platform_id');
            $table->foreign('platform_id')
                ->references('id')
                ->on('platforms');

            $table->json('details');

            $table->primary(['category_id', 'platform_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_filters');
    }
};
