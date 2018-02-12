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
            $table->increments('user_id');
            $table->primary('user_id');
            $table->string('name');
            $table->string('email');
      //      $table->unique('email'); Proveriti za ovo
            $table->string('username');
            $table->string('password');
            //photo from assets, not db?
            $table->string('position');
            $table->string('bio');
            $table->date('join_date');
            $table->string('status');
            $table->integer('strength');
            $table->string('phone_num');
            $table->rememberToken();
            $table->timestamps();
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
