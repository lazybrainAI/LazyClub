<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function showDetails($name){
        $project = DB::table('project')->where('name', '=', $name)->get();
        if(sizeof($project)>0){
            return view('project', compact('project'));
        }
        else
            abort(404);
    }
}
