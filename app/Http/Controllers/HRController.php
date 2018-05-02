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
    private function validateNewUser($request)
    {
        $request->validate(['firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'username' => 'required|unique:users,surname|max:191',
            'email' => 'required|unique:users,email|email|max:191',
        ], [
            'username.unique' => 'Username already taken.',
            'email.unique' => 'Email already taken.',
        ]);
    }

    function returnView()
    {
        $button = "No button";
        return view('hrnewuser', compact('button'));
    }

    function sendMail(Request $request)
    {
        $this->validateNewUser($request);
        $user = new User();
        $user->name = $request['firstName'];
        $user->surname = $request['lastName'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $password = str_random(8);
        $user->password = Hash::make($password);
        $user->join_date = Carbon::today();
        $user->status = 'active';
        $user->save();
        Mail::to($user->email)->send(new SendInformationsToUser($password, $user->username));
    }
}
