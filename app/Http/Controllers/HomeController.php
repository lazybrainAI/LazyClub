<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function returnEventsAndProjects(){
        $records = DB::table('event')->orderBy('date', 'desc')->take(4)->get()->toArray();
        $projects = DB::table('project')->orderBy('start_date', 'desc')->take(4)->get()->toArray();
        $projectsHalf = array_chunk($projects, 2);
        $projectFirstHalf = $projectsHalf[0];
        $projectSecondHalf = $projectsHalf[1];
        return view('home', compact('records', 'projectFirstHalf', 'projectSecondHalf'));

    }

}
