<?php
/**
 * Created by PhpStorm.
 * User: TEODORA
 * Date: 2/12/2018
 * Time: 7:24 PM
 */


/**
 * Created by PhpStorm.
 * User: TEODORA
 * Date: 2/12/2018
 * Time: 9:07 AM
 */


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('team_id');
            $table->primary('team_id');
            $table->string('team_name');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }


}