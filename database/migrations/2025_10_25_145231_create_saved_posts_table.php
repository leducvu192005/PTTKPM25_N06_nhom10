<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
   public function up()
{
    Schema::create('saved_posts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('room_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('saved_posts');
}


};
