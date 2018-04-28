<?php

namespace App\Http\Controllers;

use App\Project;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', compact('button'));
    }
    public function returnEventsAndProjects(){

        $users=User::take(12)->get();

        $events = Event::orderBy('date', 'desc')->take(4)->get();
        $projects = Project::orderBy('start_date', 'desc')->take(4)->get()->toArray();
        $button="No button";

        return view('home', compact('projects', 'events','button', 'users'));


    }
    public function saveReview(Request $request){
        $review = new Review();
        $review->description = $request['description'];
        $review->user_id = Auth::id();
        $review->created_at = Carbon::now();
        $review->updated_at = Carbon::now();
        $review->date_posted = Carbon::now();
        $event = Event::where('name', $request['project_event_select'])->get()->toArray();
        $project = Project::where('name', $request['project_event_select'])->get()->toArray();
        if(count($event)>0 && count($project)==0){
            $review->event_id = $event[0]['id'];
            $review->save();
        }
        else if(count($project)>0 && count($event)==0){
            $review->project_id = $project[0]['id'];
            $review->save();
        }
        else
            return false;




    }
}
