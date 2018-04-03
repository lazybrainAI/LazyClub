<?php

namespace App\Http\Controllers;

use App\Language;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;

class ProjectController extends Controller
{
    public function showDetails()
    {
        $projects = Project::all()->sortByDesc('start_date');;
        if (sizeof($projects)>0) {
            return view('projects', compact('projects'));
        } else
            abort(404);
    }

    public function saveNewProject(Request $request)
    {
        $project = new Project;
        $project->name = $request['project_new_name'];
        $project->description = $request['project_new_description'];
        $project->sector = $request['project_new_sector'];
        $project->start_date = $request['project_new_start_date'];
        $project->end_date = $request['project_new_end_date'];
        $location = Location::where('name', $request['project_new_location'])->get();
        $language = Language::where('name', $request['project_new_language'])->get();
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

        $project->save();

    }

}
