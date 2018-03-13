<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }
}
