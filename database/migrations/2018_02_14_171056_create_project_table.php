<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('sector');
            $table->date('start_date');
            $table->date('end_date');

            $table->integer('loc_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('language');
            $table->foreign('loc_id')->references('id')->on('location');
            $table->foreign('team_id')->references('id')->on('team');

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
        Schema::dropIfExists('project');
    }
}
