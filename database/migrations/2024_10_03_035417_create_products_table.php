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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->text('title')
                ->index();
            $table->fullText('title', 'FULLTEXT_TITLE');
            $table->text('description')
                ->index();
            $table->fullText('description', 'FULLTEXT_DESCRIPTION');

            $table->float('price')
                ->default(1);
            $table->float('old_price')
                ->nullable();

            $table->jsonb('details')
                ->nullable();

            $table->uuid('user_id')
                ->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->uuid('response_id');
            $table->foreign('response_id')
                ->references('id')
                ->on('product_responses');

            $table->uuid('platform_id');
            $table->foreign('platform_id')
                ->references('id')
                ->on('platforms');

            $table->uuid('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories');

            $table->uuid('delivery_id');
            $table->foreign('delivery_id')
                ->references('id')
                ->on('product_deliveries');

            $table->unsignedInteger('views')
                ->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
