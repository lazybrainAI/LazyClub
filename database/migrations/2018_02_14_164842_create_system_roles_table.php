<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
            $table->timestamps();
        });

        DB::table('system_roles')->insert(
            array(
                'role_name' => 'admin'
            )
        );
        DB::table('system_roles')->insert(
            array(
                'role_name' => 'HR'
            )
        );
        DB::table('system_roles')->insert(
            array(
                'role_name' => 'user'
            )
        );
        DB::table('system_roles')->insert(
            array(
                'role_name' => 'root'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_roles');
    }
}
