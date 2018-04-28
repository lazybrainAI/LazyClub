<?php

namespace App\Http\Controllers;

use App\Language;
use App\Location;
use App\Project_Attending;
use App\Role;
use App\Team;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function showDetails()
    {
        $button="No button";
        $projects = Project::all()->sortByDesc('start_date');;
        $positions = Role::where('project/event', 'p')->get();

        return view('projects', compact('projects', 'positions', 'button'));

    }

    public function saveNewProject(Request $request)
    {
        $validator = $request->validate(['project_new_name' => 'required|unique:projects,name|max:191',
            'project_new_description' => 'required|max:191',
            'project_new_sector' => 'required|max:191',
            'project_new_start_date' => 'required|date|after:yesterday',
            'project_new_end_date'=>'required|date|after_or_equal:project_new_start_date',
            'project_new_location'=>'required',
            'project_new_language'=>'required',
            'project_new_team'=>'required|max:191',
        ], [
            'project_new_name.unique' => 'Project name already taken',
            'project_new_start_date.after' => 'The project start date must be today or a date after today.',
            'project_new_end_date.after_or_equal'=>'The project end date must be equal to start date or later.',
        ]);


        $project = new Project;
        $project->name = $request['project_new_name'];
        $project->description = $request['project_new_description'];
        $project->sector = $request['project_new_sector'];
        $project->start_date = $request['project_new_start_date'];
        $project->end_date = $request['project_new_end_date'];
        $location = Location::where('name', $request['project_new_location'])->get();
        $language = Language::where('name', $request['project_new_language'])->get();
        $team = Team::where('name', $request['project_new_team'])->get();
        if ($location->first()) {
            $project->loc_id = $location->first()->id;
        } else {
            $location = new Location;
            $location->name = $request['project_new_location'];
            $location->save();
            $project->loc_id = $location->id;
        }
        if ($language->first()) {
            $project->lang_id = $language->first()->id;
        } else {
            $language = new Language();
            $language->name = $request['project_new_language'];
            $language->save();
            $project->lang_id = $language->id;
        }
        if ($team->first()) {
            $project->team_id = $team->first()->id;
        } else {
            $team = new Team();
            $team->name = $request['project_new_team'];
            $team->save();
            $project->team_id = $team->id;
        }
        $project->save();
        $openPositions = $request->input('project_new_cbox');
        $stringic = '';
        foreach ($openPositions as $openPosition) {
        $project_att = new Project_Attending;
            $role = Role::where('title', $openPosition)->get();

        $project_att->project_id = $project->id;
        $project_att->role_id = $role->first()->id;

        $project_att->user_id = '1';

//            $stringic=$stringic." ".$project_att;
        $project_att->save();

    }

//        return $stringic;


    }

}
