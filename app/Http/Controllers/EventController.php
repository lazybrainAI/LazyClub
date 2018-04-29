<?php

namespace App\Http\Controllers;

use App\Event_Attending;
use App\Language;
use App\User;
use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Role;
use App\Education;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;




class EventController extends Controller
{
    //

    public function showDetails($name){




        $event=Event::where('name', $name)->get()->first();

//ungoing button check
        $user_loggedin = Auth::user()->id;

        $attendee_role=Role::where('project/event', 'event')->where('title', 'attendee')->get()->first();
        $going=Event_Attending::where('user_id', $user_loggedin)->where('event_id', $event->id)->where('role_id', $attendee_role->id)->get()->first();

        if($going==null){
            $going="not_going"; //set going button
        }
        else{
            $going="going"; //set ungoing button
        }


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

        $organizer_roles=Role::where('project/event', 'event')->where('title', 'organizer')->get(); /*where('project/event', 'event')->*/
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
            $organizer_email=$organiser->email;
        }


        // all event attendees

        $attendee_roles=Role::where('project/event', 'event')->where('title', 'attendee')->get();
        $attendee_role_id=null;

        foreach($attendee_roles as $attendee_role){
            $attendee_role_id=$attendee_role->id;
        }

        $attendees=Event_Attending::where('event_id', $event->id)->where('role_id', $attendee_role_id)->get();

       // dd($attendees->isEmpty());
        $page_name="event";
        $button="";

        $all_attendees=Event_Attending::where('event_id', $event_id)->where('role_id', $attendee_role_id)->get();
        $num_attendees=$all_attendees->count();
        return view('event', compact('num_attendees','button','event', 'location_name', 'language_name', 'organizer_name', 'organizer_surname', 'organizer_position','organizer_email', 'attendees', 'going', 'page_name'));
    }



    public function goingEvent(Request $request, $name)
    {
        //going on event


            $user_id = $request['id_going'];
            $event_name = $name;

            $events = Event::where('name', $name)->get();
            $event_id=null;
            foreach ($events as $event) {
                $event_id = $event->id;

            }


            $user = User::findOrFail($user_id);
            $user_clicked_name = $user->name;
            $user_clicked_surname = $user->surname;
            $user_clicked_position = $user->position;
            $user_photo=$user->photo_link;


            $role = Role::where('title', 'attendee')->where('project/event', 'event')->get()->first();


            // event attendings

            $event_attendings = Event_Attending::where('user_id', $user_id)->where('event_id', $event_id)->get();



            if ($event_attendings->isEmpty()) {
                Event_Attending::create([ 'event_id' => $event_id, 'role_id' => $role->id, 'user_id' => $user->id]);
                return response()->json(['name'=>$user_clicked_name, 'surname'=>$user_clicked_surname, 'position'=>$user_clicked_position, 'photo'=>$user_photo]);

            }

            else {
                return response()->json(['msg'=>already_checked]);
            }



    }



    public function ungoingEvent(Request $request, $name){


        $role = Role::where('title', 'attendee')->where('project/event','event')->get()->first();
        $event_id=Event::where('name', $name)->get()->first();

        $event_attendings=Event_Attending::where('user_id', $request['id'])->where('event_id',$event_id->id)->where('role_id', $role->id)->get()->first();
        $event_attendings->delete();



    }


    public function editEvent(Request $request, $name){

        $event=Event::where('name', $name)->get()->first();


        $description=$request['event_description'];
        $date=$request['event_date'];
        $time=$request['event_time'];
        $lang=$request['event_language'];
        $loc=$request['event_location'];
        $lang_id=Language::where('name', $lang)->get()->first()->id;
        $loc_id=Location::where('name', $loc)->get()->first()->id;

        Event::where('id', $event->id)->update(['description'=>$description, 'time'=>$time, 'date'=>$date, 'lang_id'=>$lang_id, 'loc_id'=>$loc_id]);

        return response()->json(['name'=>"great"]);
    }




}
