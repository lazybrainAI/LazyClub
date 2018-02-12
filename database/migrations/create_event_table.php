<?php


/**
 * Created by PhpStorm.
 * User: TEODORA
 * Date: 2/12/2018
 * Time: 9:07 AM
 */


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
            $table->increments('even_id');
            $table->primary('event_id');
            $table->string('event_name');
            $table->string('event_description');
            $table->date('date');
            $table->dateTime('time');
            $table->string('location');
            $table->string('language');






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