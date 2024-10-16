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
        Schema::create('product_pictures', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('product_id')
                ->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');

            $table->uuid('image_id');
            $table->foreign('image_id')
                ->references('id')
                ->on('media_storage');

            $table->timestamp('created_at')
                ->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_pictures');
    }
};
