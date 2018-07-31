<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_text', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');
            $table->longText('content_en');
            $table->timestamps();
            $table->unsignedInteger('id_pages');

            $table->foreign('id_pages')->references('id')->on('pages');
        });


      DB::statement("ALTER TABLE `website_text` comment 'Table Untuk Menyimpan Text Statis Pada Website'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_text');
    }
}
