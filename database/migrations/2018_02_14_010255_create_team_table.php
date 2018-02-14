<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            //      $table->unique('email'); Proveriti za ovo
            $table->string('username');
            $table->string('password');
            $table->string('photo_link');
            $table->string('position');
            $table->text('bio');
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
        Schema::dropIfExists('team');
    }
}
