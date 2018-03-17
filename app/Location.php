<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }
}
