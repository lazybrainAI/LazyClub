<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function reviews(){
        return $this->hasMany('App\Review');
        }
    public function documents(){
        return $this->hasMany('App\Review');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }
    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function actions(){
        return $this->hasMany('App\Action');
    }


    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function event_attendings(){

        return $this->hasMany('App\Event_Attending');
    }

    public function project_attendings(){

        return $this->hasMany('App\Project_Attending');
    }



}
