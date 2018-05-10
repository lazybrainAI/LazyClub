<?php

namespace App\Http\Controllers;

use App\Project_Attending;
use Illuminate\Http\Request;
use App\Project;
use App\Language;
use App\Location;
use App\Role;
use App\User;

class ProjectController extends Controller
{

    public function getColumnName($row_id, $table_name){
        $id=$row_id;
        $names=$table_name::where('id', $id)->get();
        $col_name=null;
        foreach($names as $name){
            $col_name=$name;
        }
        return $col_name->name;
    }


    public function getPositionInfo($position, $project){

        $team = $project->team;
        $role=Role::where('title', $position)->get()->first()->id;
        $project_attending=Project_Attending::where('team_id', $team->id)->where('role_id', $role)->get()->first();

        if($project_attending!=null){
            $user=User::where('id', $project_attending->user_id)->get()->first();
            return $user;
        }

        else
            return null;

    }


    public function getOpenPositions($project){

        $team=$project->team;

        $lead_role_id=Role::where('title', 'Lead')->get()->first()->id;

        $lead_id=$this->getPositionInfo("Lead", $project);

        $openPositions=array();

        $project_attendings=Project_Attending::where('team_id', $team->id)->get();
        foreach ($project_attendings as $project_attending){

            if($project_attending->role_id!=$lead_role_id && $project_attending->user_id==$lead_id->id){

                $role=Role::where('id', $project_attending->role_id)->get()->first();
                array_push($openPositions, $role);

            }

        }

        return $openPositions;

    }

    public function getExistingPositions($project){

        $existing_positions=array();
        $positions=array();
        $positions["pr"]=$this->getPositionInfo("PR", $project);
        $positions["fr"]=$this->getPositionInfo("FR", $project);
        $positions["hr"]=$this->getPositionInfo("HR", $project);
        $positions["it"]=$this->getPositionInfo("IT", $project);

        foreach ($positions as $position=>$user){
            if($user!=null){
                $existing_positions[$position]= $user;
            }
        }

        return $existing_positions;

    }

    public function showDetails($name){

        $button="";
        $page_name="project";
        $open_positions=array();

        $project=Project::where('name', $name)->get()->first();


        // reviews
        $reviews=$project->reviews;


        //location and language

        $location_name=$this->getColumnName($project->loc_id, Location::class);
        $language_name=$this->getColumnName($project->lang_id, Language::class);

        //project's open positions
        $open_positions=$this->getOpenPositions($project);

        //team info
        $lead=$this->getPositionInfo("Lead", $project);

        $existing_positions=$this->getExistingPositions($project);

       // dd($existing_positions);
        return view('project', compact('button', 'page_name', 'project', 'reviews', 'location_name', 'language_name', 'open_positions', 'lead', 'existing_positions'));
    }

}
