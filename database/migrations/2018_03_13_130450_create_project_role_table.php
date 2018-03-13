<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_role', function (Blueprint $table) {
            $table->primary(['project_id', 'role_id']);
            $table->integer('project_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('project');
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
        Schema::dropIfExists('project-role');
    }
}
