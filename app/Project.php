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
        return $this->hasOne('App\Team');
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

    public function findOrCreateTeam($name, $project){
        $team = Team::where('name', $name)->get();
        if ($team->first()) {
            $id = $team->first()->id;
        } else {
            $team = new Team();
            $team->name = $name;
            $team->project_id=$project->id;
            $team->save();
            $id = $team->id;
        }

    }
    public function addLanguage($name){
        $lang = Language::where('name', $name)->get();
        return $lang->first()->id;

    }

    public function addNewRole($openPosition, $project){
        $project_att = new Project_Attending;
        $role = Role::where('title', $openPosition)->get();
        $project_att->team_id = $project->team->id;
        $project_att->role_id = $role->first()->id;
        $project_att->user_id = '1';
        $project_att->save();



    }

    public function addProjectLead($project_lead_id, $project){
        $project_att = new Project_Attending;
        $role=Role::where('title', 'lead')->get();
        $project_att->team_id = $project->team->id;
        $project_att->role_id = $role->first()->id;
        $project_att->user_id = $project_lead_id;


    }

    public function createNewProject($project, $name, $description, $sector, $start_date, $end_date, $location, $language){

        $project->name = $name;
        $project->description = $description;
        $project->sector = $sector;
        $project->start_date = $start_date;
        $project->end_date = $end_date;
        $project->loc_id = $this->findOrCreateLocation($location);
        $project->lang_id = $this->addLanguage($language);

        $this->save();

    }
    public function addOpenPositions($openPositions, $project){
        foreach ($openPositions as $openPosition) {
            $this->addNewRole($openPosition, $project);
        }

    }

    

}
