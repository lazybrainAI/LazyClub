<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventViewTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_view_type', function (Blueprint $table) {
            $table->primary(['type_id', 'event_id']);
            $table->integer('type_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('event');
            $table->foreign('type_id')->references('id')->on('view_type');

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
        Schema::dropIfExists('event_view_type');
    }
}
