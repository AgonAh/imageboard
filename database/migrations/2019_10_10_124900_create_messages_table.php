<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chatroom_id');
            $table->string('user_id')->nullable();
            $table->text('message')->nullable();
            $table->string('sentPic')->nullable();
            $table->timestamps();

            $table->foreign('chatroom_id')->references('id')->on('chatroom');
//            $table->foreign('senderId')->references('name')->on('users'); Do this manually idk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
