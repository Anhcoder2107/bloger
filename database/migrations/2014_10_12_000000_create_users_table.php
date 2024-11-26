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
            $table->string('frist_name', 255);
            $table->string('last_name', 255);
            $table->string('user_name', 255);
            $table->string('email', 255)->unique();
            $table->boolean('gender');
            $table->date('birthday');
            $table->string('phone', 100);
            $table->string('country', 255);
            $table->string('password', 255);
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
