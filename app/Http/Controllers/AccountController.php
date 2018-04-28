<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    public function showDetails(){

        $button="No button";
        return view('account', compact('button'));

    }
}
