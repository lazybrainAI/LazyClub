<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {

            $table->primary(['review_id', 'user_id']);
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('user_id')->references('id')->on('user');

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
        Schema::dropIfExists('user-role');
    }
}
