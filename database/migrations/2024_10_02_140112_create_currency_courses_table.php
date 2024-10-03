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
        Schema::create('currency_courses', function (Blueprint $table) {

            $table->uuid('from_currency_id');
            $table->foreign('from_currency_id')
                ->references('id')
                ->on('currencies');

            $table->uuid('to_currency_id');
            $table->foreign('to_currency_id')
                ->references('id')
                ->on('currencies');

            $table->primary(['from_currency_id', 'to_currency_id']);

            $table->float('value');

            $table->timestamp('updated_at')
                ->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_courses');
    }
};
