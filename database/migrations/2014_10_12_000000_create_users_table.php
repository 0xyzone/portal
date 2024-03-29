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
            $table->id();
            $table->bigInteger('company_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('role')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('alt_phone')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
