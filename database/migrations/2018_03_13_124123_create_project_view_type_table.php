<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectViewTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_view_type', function (Blueprint $table) {
            $table->primary(['type_id', 'project_id']);
            $table->integer('type_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');
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
        Schema::dropIfExists('project_view_type');
    }
}
