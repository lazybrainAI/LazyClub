<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_Attending;
use App\Language;
use App\Location;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;


class EventsController extends Controller
{
    public function showDetails()
    {

        $button = "No button";
        $events = Event::all()->sortByDesc('date');
        $events_language = Language::all();
        return view('events', compact('events', 'button', 'events_language'));

    }

    public function saveNewEvent(Request $request)
    {
        $validator = $request->validate(['event_new_name' => 'required|unique:events,name|max:191',
            'event_new_description' => 'required|max:191',
            'event_new_date' => 'required|date|after:yesterday',
            'event_new_location' => 'required',
            'event_new_language' => 'required',
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

        $user_id = Auth::id();
        $role = Role::where('project/event', 'event')->where('title', 'organizer')->first();
        $role_id = $role->id;
        $event_att = new Event_Attending();
        $event_att->event_id = $event->id;
        $event_att->role_id = $role_id;
        $event_att->user_id = $user_id;
        $event_att->id = $event_att->event_id + $event_att->role_id + $event_att->user_id;
        $event_att->save();


    }
}
