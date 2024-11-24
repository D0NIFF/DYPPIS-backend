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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('product_id');

            $table->uuid('seller_id');
            $table->uuid('customer_id');

            $table->float('amount');

            $table->string('method', 100)
                ->nullable();

            $table->timestamp('verified_at')
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
        Schema::dropIfExists('orders');
    }
};
