<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_role', function (Blueprint $table) {

            $table->primary(['event_id', 'role_id']);
            $table->integer('event_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('event');
            $table->foreign('role_id')->references('id')->on('role');
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
        Schema::dropIfExists('event-role');
    }
}
