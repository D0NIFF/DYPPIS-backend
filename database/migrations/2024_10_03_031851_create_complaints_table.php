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
        Schema::create('complaint_statuses', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('title', 100);
            $table->string('description', 355);
        });

        Schema::create('complaints', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->uuid('sender_id');
            $table->uuid('offender_id');

            $table->string('title', 100);
            $table->text('description');

            $table->jsonb('attachments');

            $table->uuid('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('complaint_statuses');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
        Schema::dropIfExists('complaint_statuses');
    }
};
