<?php

namespace App\Http\Controllers;

use App\SystemRole;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Mail\SendInformationsToUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Auth;


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

        $user_clicked=Auth::user();

        $hr=SystemRole::where('role_name', 'HR')->get()->first()->id;

        if($user_clicked->SystemRole_id==$hr){
            $add_new_user=true;
        }
        else{
            $add_new_user=false;
        }


        $users = User::all();
        $positions = SystemRole::where('id', '!=', '4')->get();
        return view('people', compact('button', 'users', 'positions', 'add_new_user'));

    }

    function sendMail(Request $request)
    {

        $this->validateNewUser($request);
        $user = new User();
        $user->name = $request['firstName'];
        $user->surname = $request['lastName'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        if ($request['positionsHR'] != null && $request['positionsHR'] != '0' && $request['positionsHR'] != 0) {
            $user->SystemRole_id = $request['positionsHR'];
        } else {
            $sys_role = SystemRole::where('role_name', 'user')->get()->first()->id;
            $user->SystemRole_id = $sys_role;
        }
        $user->photo_link = 'img/user_icon.png';
        $password = str_random(8);
        $user->password = Hash::make($password);
        $user->join_date = Carbon::today();
        $user->status = 'active';
        $user->save();

        Mail::to($user->email)->send(new SendInformationsToUser($password, $user->username));

        return response()->json((['name' => $user->name, 'surname' => $user->surname]));
    }
}
