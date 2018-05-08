<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable=['name', 'description', 'date', 'time', ''];

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

    public function findOrCreateLocation($name){
        $location = Location::where('name', $name)->get();
        if ($location->first()) {
            $id = $location->first()->id;
        } else {
            $location = new Location;
            $location->name = $name;
            $location->save();
            $id = $location->id;
        }

        return $id;
    }

    public function addLanguage($name){
        $lang = Language::where('name', $name)->get();
        return $lang->first()->id;
    }

    public function addEventOrganizer($organizer, $event){
        $role = Role::where('project/event', 'event')->where('title', 'organizer')->first();
        $role_id = $role->id;
        $event_att = new Event_Attending();
        $event_att->event_id = $event;
        $event_att->role_id = $role_id;
        $event_att->user_id = $organizer;
        $event_att->save();
    }

}
