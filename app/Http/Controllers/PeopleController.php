<?php

namespace App\Http\Controllers;

use App\SystemRole;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Mail\SendInformationsToUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PeopleController extends Controller
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

    public function showDetails()
    {
        $button = "No button";

        $users = User::all();

        return view('people', compact('button', 'users'));

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

        $sys_role=SystemRole::where('role_name', 'user')->get()->first()->id;
        $user->SystemRole_id=$sys_role;
        $user->save();

        Mail::to($user->email)->send(new SendInformationsToUser($password, $user->username));

        return response()->json((['name' => $user->name, 'surname' => $user->surname]));
    }
}
