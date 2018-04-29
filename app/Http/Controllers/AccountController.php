<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function showDetails(){
        $button="No button";
        return view('account', compact('button'));

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function changePassword(Request $request){
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        if (!(Hash::check($request['current-password'], Auth::user()->getAuthPassword()))) {
            return response()->json(['error'=>'Your current password and the password you entered do not match.'], 422);
        }
        else if(strcmp($request['current-password'], $request['new-password'])==0){
            return response()->json(['error'=>'Your current password and new password are the same.'], 422);
        }
        else{
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
        }
    }
}
