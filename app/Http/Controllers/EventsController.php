<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_Attending;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;
use App\Role;
use App\User;

class EventsController extends Controller
{

    public function isUserAttending($event, $user)
    {
        $user_loggedin = $user->id;
        $event_attending = Event_Attending::where('user_id', $user_loggedin)->where('event_id', $event->id)->get();
        if ($event_attending->isEmpty()) {
            $going = "not going";
        } else {
            $going = "going"; //set ungoing button
        }
        return $going;
    }


    private function getAllEventOrganizers($event){

        $organizer_role = Role::where('project/event', 'event')->where('title', 'organizer')->get()->first();
        $event_attending = Event_Attending::where('event_id', $event->id)->where('role_id', $organizer_role->id)->get()->first();
        return $event_attending->user_id;

    }

    public function showDetails()
    {
        $events = Event::all()->sortByDesc('date');
        $user = Auth::user();
        //foreach event check the user's going/not going status
        $goings = array();
        $organizers=array();
        foreach ($events as $event) {
            $goings[$event->name] = $this->isUserAttending($event, $user);
            $organizers[$event->name]=$this->getAllEventOrganizers($event);
        }
        $button = "No button";
        $events_language = Language::all();
        return view('events', compact('events', 'button', 'events_language', 'goings', 'user', 'organizers'));
    }

    private function validateNewEvent($request)
    {
        $request->validate([
            'event_new_name' => 'required|unique:events,name|max:191',
            'event_new_description' => 'required|max:191',
            'event_new_date' => 'required|date|after:yesterday',
            'event_new_location' => 'required',
            'event_new_language' => 'required',
        ], [
            'event_new_name.unique' => 'Event name already taken',
            'event_new_date.after' => 'The event date must be today or a date after today.',
        ]);
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
        $token = csrf_token();
        $user_id = Auth::id();
        $event->addEventOrganizer($user_id, $event->id);
        return response()->json(['event_id' => $event->id, 'name' => $event->name, 'description' => $event->description, 'location' => $event->location->name, 'token' => $token]);
    }

    public function deleteOrUnattendEvent(Request $request)
    {
        if ($request->has('attend')) {
            return $this->unattendEvent($request);
        } else {
            return $this->deleteEvent($request);
        }
    }

    public function deleteEvent(Request $request)
    {
        $attendings = Event_Attending::where('event_id', $request['id']);
        $attendings->forceDelete();
        $event = Event::where('id', $request['id']);
        $event->forceDelete();
        $num_of_events = Event::count();
        return response()->json(['num_of_events' => $num_of_events]);
    }

    public function attendEvent(Request $request)
    {
        $msg = "";
        $event_id = $request['id'];
        $user_id = Auth::id();
        $role = Role::where('title', 'attendee')->where('project/event', 'event')->get()->first();
        $event_attendings = Event_Attending::where('user_id', $user_id)->where('event_id', $event_id)->get();
        if ($event_attendings->isEmpty()) {
            Event_Attending::create(['event_id' => $event_id, 'role_id' => $role->id, 'user_id' => $user_id]);
        } else {
            $msg = "You have already attended this event!";
        }
        return response()->json(['msg' => $msg]);
    }

    public function unattendEvent(Request $request)
    {
        $user_id = Auth::id();
        $role = Role::where('title', 'attendee')->where('project/event', 'event')->get()->first();
        $event_id = $request['id'];
        $event_attendings = Event_Attending::where('user_id', $user_id)->where('event_id', $event_id)->where('role_id', $role->id)->get()->first();
        $event_attendings->delete();
    }

}
