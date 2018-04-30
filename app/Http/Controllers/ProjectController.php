<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //


    public function showDetails(){


        $button="";
        $page_name="project";

        return view('project', compact('button', 'page_name'));
    }


}
