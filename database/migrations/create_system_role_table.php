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

class CreateSystemRoleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_role', function (Blueprint $table) {
            $table->increments('role_id');
            $table->primary('role_id');
            $table->string('role_name');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_role');
    }


}