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
        }


        // all event attendees

        $attendee_roles=Role::where('project/event', 'event')->where('title', 'attendee')->get(); /*where('project/event', 'event')->*/
        $attendee_role_id=null;

        foreach($attendee_roles as $attendee_role){
            $attendee_role_id=$attendee_role->id;
        }

        $attendees=Event_Attending::where('event_id', $event->id)->where('role_id', $attendee_role_id)->get();

       // dd($attendees->isEmpty());
        return view('event', compact('event', 'location_name', 'language_name', 'organizer_name', 'organizer_surname', 'organizer_position', 'attendees'));
    }



    public function editEvent(Request $request, $name)
    {
        //going on event

        if($request->has('id_going')) {
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

            }

            return response()->json(['name'=>$user_clicked_name, 'surname'=>$user_clicked_surname, 'position'=>$user_clicked_position, 'photo'=>$user_photo]);

        }


        // update event
        else{

        }




    }



    public function ungoingEvent(Request $request, $name){


        $role = Role::where('title', 'attendee')->where('project/event','event')->get()->first();
        $event_id=Event::where('name', $name)->get()->first();

        $event_attendings=Event_Attending::where('user_id', $request['id'])->where('event_id',$event_id->id)->where('role_id', $role->id)->get()->first();
        $event_attendings->delete();





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
