<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');
            $table->integer('likes');
            $table->integer('views');
            $table->integer('comments_on_comment')->nullable();
            $table->timestamps();
            $table->unsignedInteger('id_users')->comment('id_users untuk mendapatkan data user mana yang mengomentari');
            $table->unsignedInteger('id_posts')->comment('id_posts untuk mendapatkan data yang mana yang dikomentari');


            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_posts')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comments');
    }
}
