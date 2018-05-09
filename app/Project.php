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

    public function findOrCreateTeam($name){
        $team = Team::where('name', $name)->get();
        if ($team->first()) {
            $id = $team->first()->id;
        } else {
            $team = new Team();
            $team->name = $name;
            $team->save();
            $id = $team->id;
        }

        return $id;
    }
    public function addLanguage($name){
        $lang = Language::where('name', $name)->get();
        return $lang->first()->id;

    }

    public function addNewRole($openPosition, $project_id){
        $project_att = new Project_Attending;
        $role = Role::where('title', $openPosition)->get();
        $project_att->project_id = $project_id;
        $project_att->role_id = $role->first()->id;
        $project_att->user_id = '1';
        $project_att->save();

    }

    

}
