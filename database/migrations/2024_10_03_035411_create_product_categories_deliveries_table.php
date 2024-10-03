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
        Schema::create('product_categories_deliveries', function (Blueprint $table) {
            $table->uuid('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories');

            $table->uuid('delivery_id');
            $table->foreign('delivery_id')
                ->references('id')
                ->on('product_deliveries');

            $table->primary(['category_id', 'delivery_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories_deliveries');
    }
};
