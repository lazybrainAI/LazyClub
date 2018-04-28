<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PeopleController extends Controller
{
    //

    public function showDetails(){
        $button="No button";

        $users=User::all();

        return view('people', compact('button', 'users'));

    }
}
