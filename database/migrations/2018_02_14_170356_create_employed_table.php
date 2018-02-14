<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employed', function (Blueprint $table) {
            $table->primary(['user_id', 'company_id']);

            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->string('position');

            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('company');

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
        Schema::dropIfExists('employed');
    }
}
