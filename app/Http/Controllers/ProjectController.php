<?php

namespace App\Http\Controllers;

use App\ApplicationProject;
use App\Mail\ProjectPositionApplicationReceived;
use App\Project_Attending;
use Illuminate\Http\Request;
use App\Project;
use App\Language;
use App\Location;
use App\Role;
use App\User;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Review;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class ProjectController extends Controller
{

    public function getColumnName($row_id, $table_name)
    {
        $id = $row_id;
        $names = $table_name::where('id', $id)->get();
        $col_name = null;
        foreach ($names as $name) {
            $col_name = $name;
        }
        return $col_name->name;
    }


    public function getPositionInfo($position, $project)
    {

        $team = $project->team;
        $role = Role::where('title', $position)->get()->first()->id;
        $project_attending = Project_Attending::where('team_id', $team->id)->where('role_id', $role)->get()->first();

        if ($project_attending != null) {
            $user = User::where('id', $project_attending->user_id)->get()->first();
            return $user;
        } else
            return null;

    }


    public function getOpenPositions($project)
    {

        $team = $project->team;

        $lead_role_id = Role::where('title', 'Lead')->get()->first()->id;
        $lazybot=User::where('username', 'lazybot')->get()->first();

        $lead_id = $this->getPositionInfo("Lead", $project);

        $openPositions = array();

        $project_attendings = Project_Attending::where('team_id', $team->id)->get();
        foreach ($project_attendings as $project_attending) {

            if ($project_attending->role_id != $lead_role_id && $project_attending->user_id == $lazybot->id) {

                $role = Role::where('id', $project_attending->role_id)->get()->first();
                array_push($openPositions, $role);

            }

        }

        return $openPositions;

    }

    public function getExistingPositions($project)
    {

        $existing_positions = array();
        $positions = array();
        $positions["PR"] = $this->getPositionInfo("PR", $project);
        $positions["FR"] = $this->getPositionInfo("FR", $project);
        $positions["HR"] = $this->getPositionInfo("HR", $project);
        $positions["IT"] = $this->getPositionInfo("IT", $project);

        foreach ($positions as $position => $user) {
            if ($user != null) {
                $existing_positions[$position] = $user;
            }
        }

        return $existing_positions;

    }

    public function getAllApplications($project, $position)
    {

        $users = array();
        $role = Role::where('title', $position)->get()->first();
        $applications = ApplicationProject::where('role_id', $role->id)->where('project_id', $project->id)->get();

        if (!$applications->isEmpty()) {
            foreach ($applications as $application) {
                $user = User::where('id', $application->user_id)->get()->first();
                array_push($users, $user);

            }
        } else {
            $users = null;
        }

        return $users;


    }


    public function getProjectsTeams($projects){

        $teams=array();
        foreach($projects as $project){

            $team=$project->team;
            $teams[$project->name]=Project_Attending::where('team_id', $team->id)->get();

        }

        return $teams;


    }


    public function showDetails($name)
    {

        $button = "";
        $page_name = "project";
        $open_positions = array();

        $project = Project::where('name', $name)->get();


        // reviews
        $reviews = $project->first()->reviews;


        //location and language

        $location_name = $this->getColumnName($project->first()->loc_id, Location::class);
        $language_name = $this->getColumnName($project->first()->lang_id, Language::class);

        //project's open positions
        $open_positions = $this->getOpenPositions($project->first());

        //team info
        $lead = $this->getPositionInfo("Lead", $project->first());

        $existing_positions = $this->getExistingPositions($project->first());

        //applications
        $applications = array();
        $applications["PR"] = $this->getAllApplications($project->first(), "PR");
        $applications["FR"] = $this->getAllApplications($project->first(), "FR");
        $applications["HR"] = $this->getAllApplications($project->first(), "HR");
        $applications["IT"] = $this->getAllApplications($project->first(), "IT");


        //project's team

        $teams=$this->getProjectsTeams($project);

        $project=$project->first();

        // dd($existing_positions);
        return view('project', compact('button', 'page_name', 'project', 'reviews', 'location_name', 'language_name', 'open_positions', 'lead', 'existing_positions', 'applications', 'teams'));
    }


    function validateEditedProject($request)
    {
        $request->validate([
            'project_description' => 'required|max:191',
            'project_sector' => 'required|max:191',
            'project_start_date' => 'required|date|after:yesterday',
            'project_end_date' => 'required|date|after_or_equal:project_new_start_date',
            'project_language' => 'required',
            'project_location' => 'required',
        ], [
            'project_start_date.after' => 'The project start date must be today or a date after today.',
            'project_end_date.after_or_equal' => 'The project end date must be equal to start date or later.',
        ]);

    }



    function editProject(Request $request, $name)
    {
        $this->validateEditedProject($request);
        $project = Project::where('name', $name)->get()->first();


        $description = $request['project_description'];
        $sector = $request['project_sector'];
        $start_date = $request['project_start_date'];
        $end_date = $request['project_end_date'];
        $lang = $request['project_language'];
        $loc = $request['project_location'];
        $lang_id = Language::where('name', $lang)->get()->first()->id;
        $loc_id = Location::where('name', $loc)->get()->first()->id;

        Project::where('id', $project->id)->update(['description' => $description, 'sector' => $sector, 'start_date' => $start_date, 'end_date' => $end_date, 'lang_id' => $lang_id, 'loc_id' => $loc_id]);

        $msg="Project has been saved";

        return $msg;

    }


    function addTeamMember(Request $request, $name){

        $project=Project::where('name', $name)->get()->first();

        $team=$project->team;
        $position=$request['position'];
        $user_id=$request['id'];

        $role=Role::where('title', $position)->where('project/event', 'project')->get()->first();
        Project_Attending::where('team_id', $team->id)->where('role_id', $role->id)->update(['user_id'=>$user_id]);

        //delete all applications
        $applications=ApplicationProject::where('project_id', $project->id)->where('role_id', $role->id)->get();
        foreach($applications as $application){
            $application->delete();
        }

        $user=User::where('id', $user_id)->get()->first();


        return $user;


    }


    public function editProjectorAddTeamMember(Request $request, $name){


        if($request->has('team')){
            $user= $this->addTeamMember($request, $name);
            $msg="Team member has been saved";
            return response()->json(['photo'=>$user->photo_link, 'msg'=>$msg, 'name'=>$user->name, 'surname'=>$user->surname]);

        }

        else{
            $msg=$this->editProject($request, $name);
            return response()->json(['msg'=>$msg]);

        }



    }


    function validateReview($request)
    {
        $request->validate([
            'review_new_description' => 'required|max:191',
        ], [
            'review_new_description.required' => 'Review must have description.',
        ]);
    }

    public function saveReview(Request $request, $name, $user)
    {
        $this->validateReview($request);
        $review = new Review();
        $review->description = $request['review_new_description'];
        $review->user_id = $user->id;
        $review->date_posted = Carbon::now();
        $review->project_id = Project::where('name', $name)->get()->first()->id;
        $review->save();

        $user = User::where('id', $review->user_id)->get()->first();

        return response()->json(['description' => $review->description, 'name' => $user->name, 'surname' => $user->surname]);


    }


    public function saveUserApplication(Request $request, $name, $user)
    {

        $user_id = $user->id;

        $role_name = $request['open_positions'];
        $role_id = Role::where('title', $role_name)->get()->first()->id;
        $project = Project::where('name', $name)->get()->first();


        $application = ApplicationProject::where('user_id', $user_id)->where('project_id', $project->id)->where('role_id', $role_id)->get();
        if ($application->isEmpty()) {
            $application = new ApplicationProject();
            $application->user_id = $user_id;
            $application->role_id = $role_id;
            $application->project_id = $project->id;
            $application->motivational_letter = $request['motivational_letter'];
            $application->save();

           // Mail::to($user->email)->send(new ProjectPositionApplicationReceived($project->name, $role_name, $user->name, $user->surname));
            $msg = "Your application has been saved.";

        } else {
            $msg = "You have already sent an application for this position.";


        }


        return response()->json(['msg' => $msg]);

    }

    public function saveReviewOrSaveApplication(Request $request, $name)
    {

        $action = Input::get('action');
        $user = Auth::user();

        if ($action == "review") {
            return $this->saveReview($request, $name, $user);
        } else {
            return $this->saveUserApplication($request, $name, $user);
        }


    }



}
