<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_review', function (Blueprint $table) {
            $table->primary(['review_id', 'event_id']);
            $table->integer('review_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->foreign('review_id')->references('id')->on('review');
            $table->foreign('event_id')->references('id')->on('event');
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
        Schema::dropIfExists('event_review');
    }
}
