<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    //


    public function getProfileDetails($id){

        $user=User::all()->find($id);

        return view('profile', compact('user'));
    }
}
