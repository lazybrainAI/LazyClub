<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class DocumentsController extends Controller
{
    //

    public function getExistingProjects(){

        return Project::all();


    }

    public function showDetails(){

        $documents=Document::all()->sortByDesc('date_uploaded');

        $existing_projects=$this->getExistingProjects();

        $page_name="documents";
        $button="No button";
        return view('documents', compact('page_name', 'button', 'existing_projects', 'documents') );


    }



    public function uploadDocument(Request $request){

        $user=Auth::user();
        $msg="";


        if($request->hasFile('document')){

            $this->validate($request, [

                'document' => 'required|mimes:pdf||max:10000'],

            [   'document.mimes'=> 'Not a valid document format. Please upload pdf.',
                'document.max'=>'Document is too large.'

            ]);


            $project=Project::where('name', $request['project'])->get()->first();


            $extension = $request->file('document')->getClientOriginalExtension();
            $dir = 'documents/'.$user->id.'/';
            $filename=time().'.'.$extension;

            $request->file('document')->move($dir, $filename);

            Document::create(['title'=> $request['title'], 'link'=>$dir.$filename, 'date_uploaded'=>Carbon::now(), 'user_id'=>$user->id, 'project_id'=>$project->id]);

            $msg="Saved";

        }
        else{
            $msg="Not an document";
        }

        return response()->json(['msg'=>$msg]);



    }



}
