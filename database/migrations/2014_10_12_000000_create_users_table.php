<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username', 16)->unique();
            $table->string('email');
            $table->string('password');
            $table->string('dp')->default('/storage/images/dp.jpg');
            $table->string('url')->default('');
            $table->rememberToken();
            $table->timestamps();
            $table->string('provider')->default('');
            $table->string('provider_id')->default('');
            $table->unsignedInteger('id_user_roles')->default(1);

            $table->foreign('id_user_roles')->references('id')->on('user_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
