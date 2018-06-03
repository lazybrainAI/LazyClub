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
use App\Review;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;


class EventController extends Controller
{
    //


    public function getColumnName($row_id, $table_name)
    {
        $id = $row_id;
        $names = $table_name::where('id', $id)->get();
        $col_name = null;
        foreach ($names as $name) {
            $col_name = $name;
        }
        return $col_name->name;
    }

    public function isUserAttending($event)
    {
        $user_loggedin = Auth::user()->id;

        $attendee_role = Role::where('project/event', 'event')->where('title', 'attendee')->get()->first();
        $going = Event_Attending::where('user_id', $user_loggedin)->where('event_id', $event->id)->where('role_id', $attendee_role->id)->get()->first();

        if ($going == null) {
            $going = "not_going"; //set going button
        } else {
            $going = "going"; //set ungoing button
        }
        return $going;
    }

    public function getOrganizerInfo($event)
    {

        $organizer_role = Role::where('project/event', 'event')->where('title', 'organizer')->get()->first();
        $organizer_role_id = $organizer_role->id;

        $event_id = $event->id;

        $event_attending = Event_Attending::where('event_id', $event_id)->where('role_id', $organizer_role_id)->get()->first();

        $organizer_id = $event_attending->user_id;

        $organizer = User::where('id', $organizer_id)->get()->first();

        return $organizer;

    }


    public function getAllAttendees($event_id)
    {
        $attendee_role = Role::where('project/event', 'event')->where('title', 'attendee')->get()->first();
        $attendee_role_id = $attendee_role->id;

        $attendees = Event_Attending::where('event_id', $event_id)->where('role_id', $attendee_role_id)->get();

        return $attendees;
    }

    public function numberOfAttendees($event_id)
    {

        $attendees = $this->getAllAttendees($event_id);
        return $attendees->count();

    }


    public function showDetails($name)
    {

        $user_clicked=Auth::user();


        // event info

        $event = Event::where('name', $name)->get()->first();
        $event_id = $event->id;

        //check for current user attendance

        $going = $this->isUserAttending($event);

        // reviews
        $reviews = $event->reviews;


        //location and language

        $location_name = $this->getColumnName($event->loc_id, Location::class);
        $language_name = $this->getColumnName($event->lang_id, Language::class);


        //organizer info

        $organizer = $this->getOrganizerInfo($event);

        $organizer_name = $organizer->name;
        $organizer_surname = $organizer->surname;
        $organizer_position = $organizer->position;
        $organizer_email = $organizer->email;
        $organizer_photo=$organizer->photo_link;
        $organizer_username=$organizer->username;

        // get all attendees
        $attendees = $this->getAllAttendees($event_id);
        $num_attendees = $attendees->count();

        //
        $page_name = "event";



        if($organizer->id==$user_clicked->id){
            $button="";
            $review_btn="No button";
            $goingAskOrg_btn="No button";
        }

        else{
            $button="No button";
            $review_btn="";
            $goingAskOrg_btn="";
        }




        return view('event', compact('review_btn','goingAskOrg_btn','reviews', 'num_attendees', 'button', 'event', 'location_name', 'language_name', 'organizer_name', 'organizer_username', 'organizer_surname', 'organizer_position', 'organizer_email', 'organizer_photo', 'attendees', 'going', 'page_name'));
    }


    public function goingEvent(Request $request, $name)
    {

        //event info
        $event = Event::where('name', $name)->get()->first();
        $event_id = $event->id;

        //user info
        $user_id = $request['id_going'];
        $user = User::findOrFail($user_id);
        $user_clicked_name = $user->name;
        $user_clicked_surname = $user->surname;
        $user_clicked_position = $user->position;
        $user_photo = $user->photo_link;


        // event attending
        $role = Role::where('title', 'attendee')->where('project/event', 'event')->get()->first();

        $event_attendings = Event_Attending::where('user_id', $user_id)->where('event_id', $event_id)->get();

        if ($event_attendings->isEmpty()) {
            Event_Attending::create(['event_id' => $event_id, 'role_id' => $role->id, 'user_id' => $user->id]);
            return response()->json(['name' => $user_clicked_name, 'surname' => $user_clicked_surname, 'position' => $user_clicked_position, 'photo' => $user_photo]);

        } else {
            return response()->json(['msg' => already_checked]);
        }

    }


    public function ungoingEvent(Request $request, $name)
    {

        $role = Role::where('title', 'attendee')->where('project/event', 'event')->get()->first();
        $event_id = Event::where('name', $name)->get()->first();
        $event_attendings = Event_Attending::where('user_id', $request['id'])->where('event_id', $event_id->id)->where('role_id', $role->id)->get()->first();
        $event_attendings->delete();

        $num_attendees = $this->numberOfAttendees($event_id);

        return response()->json(['num_attendees' => $num_attendees]);


    }

    public function editEventOrSaveReview(Request $request, $name)
    {

        $action = Input::get('action');


        if ($action === 'event') {
            return $this->editEvent($request, $name);


        } elseif ($action === 'review') {
            return $this->saveReview($request, $name);

        } else {
            return 1;
        }

    }


    private function validateEditedEvent($request)
    {
        $request->validate([
            'event_description' => 'required|max:191',
            'event_date' => 'required|date|after:yesterday',
            'event_location' => 'required',
            'event_language' => 'required',
        ], [
            'event_date.after' => 'The event date must be today or a date after today.',
        ]);
    }

    public function editEvent(Request $request, $name)
    {

        $this->validateEditedEvent($request);
        $event = Event::where('name', $name)->get()->first();


        $description = $request['event_description'];
        $date = $request['event_date'];
        $time = $request['event_time'];
        $lang = $request['event_language'];
        $loc = $request['event_location'];
        $lang_id = Language::where('name', $lang)->get()->first()->id;
        $loc_id = Location::where('name', $loc)->get()->first()->id;

        Event::where('id', $event->id)->update(['description' => $description, 'time' => $time, 'date' => $date, 'lang_id' => $lang_id, 'loc_id' => $loc_id]);

        return response()->json(['name' => "great"]);
    }

// this

    function validateReview($request)
    {
        $request->validate([
            'review_new_description' => 'required|max:191',
        ], [
            'review_new_description.required' => 'Review must have description.',
        ]);
    }

    public function saveReview(Request $request, $name)
    {

        $this->validateReview($request);
        $review = new Review();
        $review->description = $request['review_new_description'];
        $review->user_id = Auth::id();
        $review->date_posted = Carbon::now();
        $review->event_id = Event::where('name', $name)->get()->first()->id;

        $review->save();

        $user = User::where('id', $review->user_id)->get()->first();

        return response()->json(['description' => $review->description, 'name' => $user->name, 'surname' => $user->surname]);


    }


}
