<?php

namespace App\Http\Controllers;

use App\Language;
use App\Project_Attending;
use App\Role;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Project;
use \Illuminate\Support\Facades\Auth;
use App\SystemRole;



class ProjectsController extends Controller
{
    private function validateNewProject($request)
    {
        $request->validate([
            'project_new_name' => 'required|unique:projects,name|max:191',
            'project_new_description' => 'required|max:191',
            'project_new_sector' => 'required|max:191',
            'project_new_start_date' => 'required|date|after:yesterday',
            'project_new_end_date' => 'required|date|after_or_equal:project_new_start_date',
            'project_new_location' => 'required',
            'project_new_language' => 'required',
            'project_new_team' => 'required|unique:teams,name|max:191',
        ], [
            'project_new_name.unique' => 'Project name already taken',
            'project_new_start_date.after' => 'The project start date must be today or a date after today.',
            'project_new_end_date.after_or_equal' => 'The project end date must be equal to start date or later.',
            'project_new_team.unique'=>'Team name must be unique.',
        ]);
    }


    public function getProjectsTeams($project){

        $team_id=$project->team->id;
        $team=Project_Attending::where('team_id', $team_id)->get();

        return $team;


    }


    private function getProjectOrganizer($project){

        $team = $project->team;
        $role = Role::where('title', 'lead')->get()->first()->id;
        $project_attending = Project_Attending::where('team_id', $team->id)->where('role_id', $role)->get()->first();
        return $project_attending->user_id;


    }

    public function showDetails()
    {
        $user=Auth::user();
        $button = "No button";
        $projects = Project::all()->sortByDesc('start_date');;
        $positions = Role::where('project/event', 'project')->get();
        $project_language = Language::all();

        $hr=SystemRole::where('role_name', 'HR')->get()->first()->id;
        $add_new_project="";

        if($user->SystemRole_id==$hr) {
            $add_new_project="hr";

        }

        if(!$projects->isEmpty()) {
            $teams=array();
            $organizers=array();
            foreach ($projects as $project){
                $teams[$project->name]= $this->getProjectsTeams($project);
                $organizers[$project->name]=$this->getProjectOrganizer($project);
            }
            return view('projects', compact('add_new_project','projects', 'positions', 'button', 'project_language', 'teams', 'organizers', 'user'));

        }

        else {
            return view('projects', compact('add_new_project','projects', 'positions', 'button', 'project_language'));

        }



    }

    public function saveNewProject(Request $request)
    {
        $project_lead_id=Auth::user()->id;
        $lazybot_id=User::where('username', 'lazybot')->get()->first();
        $lazybot_id = $lazybot_id->id;

        $this->validateNewProject($request);
        $project = new Project();
        $project->createNewProject($project, $request['project_new_name'], $request['project_new_description'], $request['project_new_sector'], $request['project_new_start_date'], $request['project_new_end_date'], $request['project_new_location'], $request['project_new_language']);
        $msg=$project->findOrCreateTeam($request['project_new_team'], $project->id);
        $project->addOpenPositions($request->input('project_new_cbox'), $project, $project_lead_id, $lazybot_id);





        $team = Team::where('project_id', $project->id)->first();
        $attendies = Project_Attending::where('team_id', $team->id)->get();
        $users = array();

        foreach ($attendies as $attendy){
            $user = User::where('id', $attendy->user_id)->first();
            array_push($users, $user);
        }
        return response()->json((['msg'=>$msg,'id' => $project->id, 'name' => $project->name, 'description' => $project->description, 'team'=>$users]));
    }



    public function deleteProject(Request $request)
    {
        $project = Project::where('id', $request['id'])->get()->first();
        $team=$project->team;

        $attendings = Project_Attending::where('team_id', $team->id)->get();
        foreach ($attendings as $attending){
            $attending->delete();
        }

        $team->delete();

        $reviews=$project->reviews;
        if(!$reviews==null){
            foreach($reviews as $review){
                $review ->delete();

            }
        }
        $applications=$project->project_applications;
        if($applications!=null){
            foreach($applications as $application){
                $application->delete();

            }
        }

        $documents=$project->dosuments;
        if($documents!=null){
            foreach($documents as $doc){
                $doc->delete();

            }
        }

        $project->delete();
        $num_of_projects = Project::count();
        return response()->json(['num_of_projects' => $num_of_projects]);
    }
}