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
        Schema::create('conflicts', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders');

            $table->string('title', 100);
            $table->text('description');

            $table->timestamps(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conflicts');
    }
};
