<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
class ProjectController extends Controller
{
    public function showDetails($name){
        $project = Project::where('name',$name)->first();
        if($project!==null){
            return view('project', compact('project'));
        }
        else
            abort(404);
    }
}
