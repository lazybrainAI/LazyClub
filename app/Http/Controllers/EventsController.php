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


    public function isUserAttending($event, $user){
        $user_loggedin = $user->id;

        $event_attending=Event_Attending::where('user_id', $user_loggedin)->where('event_id', $event->id)->get();

        if($event_attending->isEmpty()){
            $going="not going";
        }

        else{
            $going="going"; //set ungoing button
        }

        return $going;
    }

    public function showDetails()
    {

        $events = Event::all()->sortByDesc('date');
        $user=Auth::user();

        //foreach event check the user's going/not going status
        $goings=array();
        foreach ($events as $event){
            $goings[$event->name]=$this->isUserAttending($event, $user);
        }



        $button = "No button";
        $events_language = Language::all();
        return view('events', compact('events', 'button', 'events_language', 'goings'));

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
        $event->lang_id = $language->first()->id;
        $event->save();
        $user_id = Auth::id();
        $role = Role::where('project/event', 'event')->where('title', 'organizer')->first();
        $role_id = $role->id;
        $event_att = new Event_Attending();
        $event_att->event_id = $event->id;
        $event_att->role_id = $role_id;
        $event_att->user_id = $user_id;

        $event_att->save();


    }



    public function attendEvent(Request $request){

        $msg="";
        $event_id=$request['id'];
        $user_id=Auth::id();
        $role = Role::where('title', 'attendee')->where('project/event', 'event')->get()->first();
        $event_attendings = Event_Attending::where('user_id', $user_id)->where('event_id', $event_id)->get();
        if($event_attendings->isEmpty()){
            Event_Attending::create([ 'event_id' => $event_id, 'role_id' => $role->id, 'user_id' => $user_id]);

        }

        else {
            $msg="You have already attended this event!";
        }


        return response()->json(['msg'=>$msg]);


    }

    public function unattendEvent(Request $request){

        $user_id=Auth::id();
        $role = Role::where('title', 'attendee')->where('project/event','event')->get()->first();
        $event_id=$request['id'];
        $event_attendings=Event_Attending::where('user_id', $user_id)->where('event_id',$event_id)->where('role_id', $role->id)->get()->first();
        $event_attendings->delete();



    }

}
