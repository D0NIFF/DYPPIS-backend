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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->string('nickname')
                ->unique();

            $table->string('email')
                ->unique();

            $table->string('password');
            $table->rememberToken();

            $table->uuid('avatar_id')
                ->nullable();
            $table->foreign('avatar_id')
                ->references('id')
                ->on('media_storage');

            $table->unsignedBigInteger('role_id')
                ->default(1);
            $table->foreign('role_id')
                ->references('id')
                ->on('user_roles');

            $table->decimal('balance')
                ->default(0);

            $table->float('rating')
                ->nullable();

            $table->string('seo_source')
                ->nullable();

            $table->string('ip_address');

            $table->timestamp('email_verified_at')
                ->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')
                ->primary();
            $table->string('token');

            $table->timestamp('created_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
