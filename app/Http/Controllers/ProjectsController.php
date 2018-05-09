<?php

namespace App\Http\Controllers;

use App\Language;
use App\Location;
use App\Project_Attending;
use App\Role;
use App\Team;
use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    private function validateNewProject($request)
    {
        $request->validate(['project_new_name' => 'required|unique:projects,name|max:191',
            'project_new_description' => 'required|max:191',
            'project_new_sector' => 'required|max:191',
            'project_new_start_date' => 'required|date|after:yesterday',
            'project_new_end_date' => 'required|date|after_or_equal:project_new_start_date',
            'project_new_location' => 'required',
            'project_new_language' => 'required',
            'project_new_team' => 'required|max:191',
        ], [
            'project_new_name.unique' => 'Project name already taken',
            'project_new_start_date.after' => 'The project start date must be today or a date after today.',
            'project_new_end_date.after_or_equal' => 'The project end date must be equal to start date or later.',
        ]);
    }

    public function showDetails()
    {
        $button = "No button";
        $projects = Project::all()->sortByDesc('start_date');;
        $positions = Role::where('project/event', 'project')->get();
        $project_language = Language::all();
        return view('projects', compact('projects', 'positions', 'button', 'project_language'));
    }

    public function saveNewProject(Request $request)
    {
        $this->validateNewProject($request);
        $project = new Project();
        $project->createNewProject($project, $request['project_new_name'], $request['project_new_description'], $request['project_new_sector'], $request['project_new_start_date'], $request['project_new_end_date'], $request['project_new_location'], $request['project_new_language'], $request['project_new_team']);
        $project->addOpenPositions($request->input('project_new_cbox'), $project->id);
        return response()->json((['id' => $project->id, 'name' => $project->name, 'description' => $project->description]));
    }

    public function deleteProject(Request $request)
    {
        $attendings = Project_Attending::where('project_id', $request['id']);
        $attendings->forceDelete();
        $project = Project::where('id', $request['id']);
        $project->forceDelete();
        $num_of_projects = Project::count();
        return response()->json(['num_of_projects' => $num_of_projects]);
    }
}