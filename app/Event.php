<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';


    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }


    public function language(){
        return $this->belongsTo('App\Language');
    }
    public function location(){
        return $this->belongsTo('App\Location', 'loc_id', 'id');
    }



}
