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
        Schema::create('user_confirms', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('token', 256);

            $table->string('ip_address', 45);

            $table->timestamp('created_at')
                ->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_confirms');
    }
};
