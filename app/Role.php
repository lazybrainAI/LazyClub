<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    public function projects(){
        return $this->belongsToMany('App\Project');
    }



    public function events(){
        return $this->belongsToMany('App\Event');
    }
}
