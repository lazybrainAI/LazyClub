<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->primary(['user_id', 'institution_id']);
            $table->string('title');
            $table->date('start_date');  //period of time
            $table->date('end_date');

            $table->integer('user_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('institution_id')->references('id')->on('institution');

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
        Schema::dropIfExists('click_to_add');
    }
}
