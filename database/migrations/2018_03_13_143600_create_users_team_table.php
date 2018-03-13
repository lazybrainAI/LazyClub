<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_team', function (Blueprint $table) {

            $table->primary(['team_id', 'user_id']);
            $table->integer('team_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('team');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_team');
    }
}
