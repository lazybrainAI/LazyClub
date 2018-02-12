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
            $table->increments('project_id');
            $table->primary('project_id');
            $table->string('project_name');
            $table->string('project_description');
            $table->string('sector');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('project');
    }


}