<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('description');
            $table->date('date');
            $table->time('time');
            $table->string('location');
            $table->string('language');

            $table->integer('loc_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->foreign('loc_id')->references('id')->on('location');
            $table->foreign('lang_id')->references('id')->on('language');
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
        Schema::dropIfExists('event');
    }
}
