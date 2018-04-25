<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('project/event');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                'title' => 'organizer',
                'project/event'=>'event'
            )
        );

        DB::table('roles')->insert(
            array(
                'title' => 'attendee',
                'project/event'=>'event'
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
