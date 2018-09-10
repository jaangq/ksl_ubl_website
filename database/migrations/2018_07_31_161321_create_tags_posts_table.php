<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_posts');
            $table->unsignedInteger('id_tags');
            $table->timestamps();

            $table->foreign('id_posts')->references('id')->on('posts')->onDelete('cascade');;
            $table->foreign('id_tags')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_posts');
    }
}
