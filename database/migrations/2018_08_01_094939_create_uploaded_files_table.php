<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('name');
            $table->string('mime');
            $table->bigInteger('size');
            $table->longText('hash');
            $table->timestamps();
            $table->unsignedInteger('id_users');

            $table->foreign('id_users')->references('id')->on('users');

            // $table->unsignedInteger('file_types_id');
            // $table->foreign('file_types_id')->references('id')->on('file_types');
            // $table->increments('id');
            // $table->string('path')->unique();
            // $table->enum('type', ['file', 'dir']);
            // $table->binary('content');
            // $table->integer('size');
            // $table->string('mimetype');
            // $table->integer('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploaded_files');
    }
}
