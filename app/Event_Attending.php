<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Attending extends Model
{
    //
    protected $table='event_attendings';


    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function event(){
        return $this->belongsTo('App\Event');
    }


}
