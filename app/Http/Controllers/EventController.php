<?php

namespace App\Http\Controllers;

use App\Event;
use App\Language;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Validator;

class EventController extends Controller
{


    public function showDetails()
    {
        $events = Event::all()->sortByDesc('date');
        return view('events', compact('events'));

    }

    public function saveNewEvent(Request $request)
    {
        $validator = $request->validate(['event_new_name' => 'required|unique:events,name|max:191',
            'event_new_description' => 'required|max:191',
            'event_new_date' => 'required|date|after:yesterday',
            'event_new_location'=>'required',
            'event_new_language'=>'required',
        ], [
            'event_new_name.unique' => 'Event name already taken',
            'event_new_date.after' => 'The event date must be today or a date after today.',
        ]);


        $event = new Event;
        $event->name = $request['event_new_name'];
        $event->description = $request['event_new_description'];
        $event->date = $request['event_new_date'];
        $event->time = $request['event_new_time'];
        $location = Location::where('name', $request['event_new_location'])->get();
        $language = Language::where('name', $request['event_new_language'])->get();
        if ($location->first()) {
            $event->loc_id = $location->first()->id;
        } else {
            $location = new Location;
            $location->name = $request['event_new_location'];
            $location->save();
            $event->loc_id = $location->id;
        }
        if ($language->first()) {
            $event->lang_id = $language->first()->id;
        } else {
            $language = new Language();
            $language->name = $request['event_new_language'];
            $language->save();
            $event->lang_id = $language->id;
        }

        $event->save();


    }


}
