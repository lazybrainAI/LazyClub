<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    //

    public function showDetails($name){

        $event=Event::where('name', $name)->get()->first();

        return view('event', compact('event'));



    }



}
