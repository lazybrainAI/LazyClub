<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });


        DB::table('social_networks')->insert(
            array(
                'name' => 'facebook'

            )
        );

        DB::table('social_networks')->insert(
            array(
                'name' => 'linkedin'

            )
        );
        DB::table('social_networks')->insert(
            array(
                'name' => 'twitter'

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
        Schema::dropIfExists('social_networks');
    }
}
