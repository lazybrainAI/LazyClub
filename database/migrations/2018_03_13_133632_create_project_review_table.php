<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_review', function (Blueprint $table) {
            $table->primary(['review_id', 'project_id']);
            $table->integer('review_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->foreign('review_id')->references('id')->on('review');
            $table->foreign('project_id')->references('id')->on('project');


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
        Schema::dropIfExists('project-review');
    }
}
