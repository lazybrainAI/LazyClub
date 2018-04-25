<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\SendInformationsToUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HRController extends Controller
{
    function returnView(){
        return view("hrnewuser");
    }

    function sendMail(Request $request){
        $validator = $request->validate(['name' => 'required|max:191',
            'lastname' => 'required|max:191',
            'username' => 'required|unique:users,surname|max:191',
            'mail' => 'required|unique:users,email|email|max:191',
        ], [
            'project_new_name.unique' => 'Project name already taken',
            'project_new_start_date.after' => 'The project start date must be today or a date after today.',
            'project_new_end_date.after_or_equal'=>'The project end date must be equal to start date or later.',
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->surname = $request['lastname'];
        $user->username = $request['username'];
        $user->email = $request['mail'];
        $password = str_random(8);
        $user->password = Hash::make($password);
        $user->join_date = Carbon::today();
        $user->status = 'active';
        $user->save();
        Mail::to($user->email)->send(new SendInformationsToUser($password, $user->username));



    }
}
