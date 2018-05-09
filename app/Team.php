<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //


    public function projects(){
        return $this->hasMany('App\Project');
    }


    public function project_attendings(){

        return $this->hasMany('App\Project_Attending');
    }

}
