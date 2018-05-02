<?php

namespace App\Http\Controllers;

use App\Event;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    private function validateNewEvent($request)
    {
        $request->validate(['event_new_name' => 'required|unique:events,name|max:191',
            'event_new_description' => 'required|max:191',
            'event_new_date' => 'required|date|after:yesterday',
            'event_new_location' => 'required',
            'event_new_language' => 'required',
        ], [
            'event_new_name.unique' => 'Event name already taken',
            'event_new_date.after' => 'The event date must be today or a date after today.',
        ]);
    }

    public function showDetails()
    {
        $button = "No button";
        $events = Event::all()->sortByDesc('date');
        $events_language = Language::all();
        return view('events', compact('events','button', 'events_language'));
    }

    public function saveNewEvent(Request $request)
    {
        $this->validateNewEvent($request);
        $event = new Event;
        $event->name = $request['event_new_name'];
        $event->description = $request['event_new_description'];
        $event->date = $request['event_new_date'];
        $event->time = $request['event_new_time'];
        $event->loc_id = $event->findOrCreateLocation($request['event_new_location']);
        $event->lang_id = $event->addLanguage($request['event_new_language']);
        $event->save();

        $user_id = Auth::id();
        $event->addEventOrganizer($user_id, $event->id);

        return response()->json(['name'=>$event->name, 'description'=>$event->description, 'location'=>$event->location->name]);
    }


    public function returnVariables($event){
        $name = $event->name;
        $description = $event->description;
        $location = $event->location;
        return view('event', compact('name','description', 'location'));
    }

}
