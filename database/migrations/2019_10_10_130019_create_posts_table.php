<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('boards_id');
            $table->string('title')->nullable();
            $table->string('postPic')->unique();
            $table->text('postText');
            $table->text('user')->nullable();
            $table->timestamps();

//            $table->foreign('user')->references('name')->on('users'); Do this manually
//            $table->foreign('boards_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
