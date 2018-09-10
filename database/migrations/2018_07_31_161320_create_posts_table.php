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
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->string('title_en')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('title_slug');
            $table->integer('likes');
            $table->integer('views');
            $table->timestamps();
            $table->unsignedInteger('id_categories')->nullable();
            $table->unsignedInteger('id_sub_categories')->nullable();
            $table->unsignedInteger('id_sub_sub_categories')->nullable();
            $table->unsignedInteger('id_pages');
            $table->unsignedInteger('id_post_status');
            $table->unsignedInteger('id_users');

            $table->foreign('id_categories')->references('id')->on('categories');
            $table->foreign('id_sub_categories')->references('id')->on('sub_categories');
            $table->foreign('id_sub_sub_categories')->references('id')->on('sub_sub_categories');
            $table->foreign('id_pages')->references('id')->on('pages');
            $table->foreign('id_post_status')->references('id')->on('post_status');
            $table->foreign('id_users')->references('id')->on('users');
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
