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
            $table->string('surname');
            //      $table->unique('email'); Proveriti za ovo
            $table->string('username');
            $table->string('password');
            $table->string('email');

            $table->string('photo_link');
            $table->string('position');
            $table->text('bio');
            $table->date('join_date');
            $table->string('status');
            $table->integer('strength');
            $table->string('phone_num');

            $table->integer('SystemRole_id')->unsigned();
            $table->foreign('SystemRole_id')->references('id')->on('system_role');
            $table->rememberToken();
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
