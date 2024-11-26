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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id', 100);
            $table->string('user_name', 255);
            $table->datetimes('create_date');
            $table->text('title');
            $table->text('slug');
            $table->text('body');
            $table->text('htmlbody');
            $table->string('image', 255);
            $table->bigInteger('like_count');
            $table->bigInteger('comment_count');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
