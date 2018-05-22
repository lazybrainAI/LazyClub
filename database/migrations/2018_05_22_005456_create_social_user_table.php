<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_user', function (Blueprint $table) {
            $table->primary(['user_id', 'sn_id']);
            $table->integer('user_id')->unsigned();
            $table->integer('sn_id')->unsigned();
            $table->string('URL');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sn_id')->references('id')->on('social_networks');

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
        Schema::dropIfExists('social_user');
    }
}
