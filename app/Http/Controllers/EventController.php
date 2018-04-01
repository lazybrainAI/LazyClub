<?php

namespace App\Http\Controllers;

use App\Event;
use App\Language;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class EventController extends Controller
{
    public function showDetails(){
        $events = Event::all();
        if(sizeof($events)>0){
            return view('events', compact('events'));
        }
        else
            abort(404);
    }

    public function saveNewEvent(Request $request){
        $event = new Event;
        $event->name = $request['event_new_name'];
        $event->description = $request['event_new_description'];
        $event->date = $request['event_new_date'];
        $event->time = $request['event_new_time'];
        $location = Location::where('name', $request['event_new_location'])->get();
        $language = Language::where('name', $request['event_new_language'])->get();
        if($location->first()){
            $event->loc_id = $location->first()->id;
        }
        else{
            $location = new Location;
            $location->name = $request['event_new_location'];
            $location->save();
            $event->loc_id = $location->id;
        }
       if($language->first()){
            $event->lang_id = $language->first()->id;
       }else{
           $language = new Language();
           $language->name = $request['event_new_language'];
           $language->save();
           $event->lang_id = $language->id;
       }

        $event->save();

    }
}
