<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('sector');
            $table->date('start_date');
            $table->date('end_date');

            $table->integer('loc_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('lang_id')->references('id')->on('languages');
            $table->foreign('loc_id')->references('id')->on('locations');
            $table->foreign('team_id')->references('id')->on('teams');

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
        Schema::dropIfExists('projects');
    }
}
