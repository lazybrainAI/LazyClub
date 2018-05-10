<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Language;
use App\Location;

class ProjectController extends Controller
{

    public function getColumnName($row_id, $table_name){
        $id=$row_id;
        $names=$table_name::where('id', $id)->get();
        $col_name=null;
        foreach($names as $name){
            $col_name=$name;
        }
        return $col_name->name;
    }

    public function showDetails($name){

        $button="";
        $page_name="project";

        $project=Project::where('name', $name)->get()->first();


        // reviews
        $reviews=$project->reviews;


        //location and language

        $location_name=$this->getColumnName($project->loc_id, Location::class);
        $language_name=$this->getColumnName($project->lang_id, Language::class);

        //project's team info





        return view('project', compact('button', 'page_name', 'project', 'reviews', 'location_name', 'language_name'));
    }

}
