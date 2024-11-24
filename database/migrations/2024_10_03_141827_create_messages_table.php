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
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('chat_id');
            $table->uuid('user_id');

            $table->boolean('is_read')
                ->default(false);

            $table->uuid('reply_id')
                ->nullable();

            $table->string('message', 300);
            $table->jsonb('attachments')
                ->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
