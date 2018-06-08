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
        $admin=SystemRole::where('role_name', 'admin')->get()->first()->id;

        if($user_clicked->SystemRole_id==$hr) {
            $add_new_user="hr";

        }
        elseif($user_clicked->SystemRole_id==$admin){
            $add_new_user="admin";
        }
        else{
            $add_new_user="other";
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
        $user->sector=$request['user_sector'];
        $user->position=$request['user_position'];

        $sys_role = SystemRole::where('role_name', $request['roles'])->get()->first()->id;
        $user->SystemRole_id = $sys_role;

        $user->photo_link = 'img/user_icon.png';
        $password = str_random(8);
        $user->password = Hash::make($password);
        $user->join_date = Carbon::today();
        $user->status = 'active';
        $user->save();

        Mail::to($user->email)->send(new SendInformationsToUser($password, $user->username, $user->name));

        return response()->json((['name' => $user->name, 'surname' => $user->surname, 'photo'=>$user->photo_link]));
    }
}
