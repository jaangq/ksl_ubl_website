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
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->string('ip');
            $table->unsignedInteger('comments_on_comment')->nullable()->comment('id_comments untuk mendapatkan id comment untuk reply comments');
            $table->timestamps();
            $table->unsignedInteger('id_users')->comment('id_users untuk mendapatkan data user mana yang mengomentari');
            $table->unsignedInteger('id_posts')->comment('id_posts untuk mendapatkan data yang mana yang dikomentari');

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_posts')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('comments_on_comment')->references('id')->on('post_comments')->onDelete('cascade');
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
