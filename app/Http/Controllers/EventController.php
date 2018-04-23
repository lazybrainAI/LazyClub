<?php

namespace App\Http\Controllers;

use App\Event_Attending;
use App\Language;
use App\User;
use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Role;


class EventController extends Controller
{
    //

    public function showDetails($name){

        $event=Event::where('name', $name)->get()->first();

        $loc_id=$event->loc_id;
        $locations=Location::where('id', $loc_id)->get();

        foreach($locations as $location){
            $location_name=$location->name;
        }

        $lang_id=$event->lang_id;
        $languages=Language::where('id', $lang_id)->get();

        foreach($languages as $language){
            $language_name=$language->name;
        }

        //organizer info

        $organizer_roles=Role::where('title', 'organizer')->get(); /*where('project/event', 'event')->*/
        $organizer_role_id=null;

        foreach($organizer_roles as $organizer_role){
            $organizer_role_id=$organizer_role->id;
        }

        $event_id=$event->id;

        $event_attendings=Event_Attending::where('event_id', $event_id)->get();

        foreach($event_attendings as $event_attending){
            if($event_attending->role_id==$organizer_role_id){
                $organizer_id=$event_attending->user_id;
            }
        }

        $organizers=User::where('id', $organizer_id)->get();

        foreach ($organizers as $organiser){
            $organizer_name=$organiser->name;
            $organizer_surname=$organiser->surname;
            $organizer_position=$organiser->position;
        }


        // all event attendees

        $attendee_roles=Role::where('title', 'attendee')->get(); /*where('project/event', 'event')->*/
        $attendee_role_id=null;

        foreach($attendee_roles as $attendee_role){
            $attendee_role_id=$attendee_role->id;
        }

        $attendees=Event_Attending::where('event_id', $event->id)->where('role_id', $attendee_role_id)->get();


        return view('event', compact('event', 'location_name', 'language_name', 'organizer_name', 'organizer_surname', 'organizer_position', 'attendees'));
    }

    public function editEvent(){

    }

    public function goingOnEvent(Request $request){

        $user_id=$request['id'];
        $event_name = $request['event'];

        $events=Event::where('name', $event_name)->get();
        foreach ($events as $event) {

            $event_id=$event->id;

        }

        $user=User::findOrFail($user_id);
        $user_clicked_name=$user->name;
        $user_clicked_surname=$user->surname;
        $user_clicked_position=$user->position;


        $role=Role::where('title', 'attendee')->get()->first();


        // event attendings

        $event_attendings=Event_Attending::where('user_id', $user_id)->where('event_id', $event_id)->get();

        if($event_attendings->isEmpty()){
            Education::create(['event_id' => $event_id, 'role_id'=> $role->id, 'user_id'=>$user->id]);

        }




    }



}
