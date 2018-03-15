<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function showDetails($name){
        $event = DB::table('event')->where('event_name', '=', $name)->get();
        if(sizeof($event)>0){
            return view('event', compact('event'));
        }
        else
            abort(404);
    }
}
