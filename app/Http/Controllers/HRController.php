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
