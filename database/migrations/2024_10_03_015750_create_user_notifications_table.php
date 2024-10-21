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
        Schema::create('notification_types', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('title', 100);
        });

        Schema::create('user_notifications', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('user_id');

            $table->uuid('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('notification_types');

            $table->string('title', 100);
            $table->text('message');

            $table->boolean('is_read')
                ->default(false);

            $table->timestamp('created_at')
                ->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_notifications');
        Schema::dropIfExists('notification_types');
    }
};
