<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    public function event_attendings(){

        return $this->hasMany('App\Event_Attending');
    }

    public function project_attendings(){

        return $this->hasMany('App\Project_Attending');
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
