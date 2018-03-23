<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\User;
use App\Institution;

use App\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    //


    public function getProfileDetails($id)
    {

        $user = User::all()->find($id);
        // user's social network links
        $socials = $user->social_network;
        $fb="#";
        $linked="#";
        $twitter="#";
        foreach ($socials as $social){
            if ($social->sn_name == 'facebook') {
                $fb = $social->URL;
            }
            if ($social->sn_name == 'twitter') {
                $twitter = $social->URL;
            }

            if($social->sn_name == 'linkedin'){
                $linked = $social->URL;

            }

        }

        //user's projects

        foreach ($user->teams as $team) {
            $projects=$team->projects;
           // dd($projects);
        }


        //user's company
        $companies=$user->companies;
        $company_count=$companies->count();

        //user's education
        $institutions=$user->institutions;
        $institution_count=$institutions->count();

        //echo $institutions; */

        /*
        $institution_names  = array('FON', 'BG',  'ETF', 'MM'); //institution name

        $institution_addresses=array('Am', 'BB', 'LL', 'jj');
        $start_dates=array('2019-1-1', '2019-1-2', '2019-1-3', '2019-1-9');
        $end_dates=array('2019-3-1', '2019-3-2', '2019-3-3', '2019-3-9');
        $titles=array('mm', 'drr', 'msc','mst');





        $count = count($institution_names);
        for($i=0;  $i<$count; $i++){
             $institution_name= $institution_names[$i];

            $institutions=Institution::where('name', $institution_name)->get();

            if($institutions->isEmpty()){
                //create institution

                $inst = Institution::create(['name' => $institution_name, 'address'=> $institution_addresses[$i]]);
                $inst->save();
                $inst_id=$inst->id;
                $user->institutions()->attach( $inst_id, ['start_date' => $start_dates[$i], 'end_date'=> $end_dates[$i], 'title'=>$titles[$i] ]);


                echo $inst_id;
            }


                else {
                    foreach($institutions as $institution){
                        //echo $institution->id;

                        $inst_id=$institution->id;
                        $user->institutions()->attach( $inst_id, ['start_date' => $start_dates[$i], 'end_date'=> $end_dates[$i], 'title'=>$titles[$i] ]);

                        echo $inst_id;
                }

            }


        } */


          return view('profile', compact('user', 'fb' , 'twitter', 'linked', 'projects', 'companies', 'institutions', 'institution_count', 'company_count'));
    }
    public function editProfile(Request $request, $id){
        $user = User::findOrFail($id);

        $user->name=$request['user_name'];
        $user->position=$request['user_position'];
        $user->sector=$request['user_sector'];
        $user->email=$request['user_email'];
        $user->phone_num=$request['phone_num'];
        $user->bio=$request['bio'];
        $user->update();


        //$institution_names [] = $request->institution; //institution name




        /* foreach($institution_names as $institution_name){

         $inst=Institution::where('name', $institution_name)->first();
        if($inst==null){
            //create institution
        $institution = Institution::create($institution_name);
        $inst_id=$institution->id;

        }
        else {
            $inst_id=$inst->id;
        }


        }


         foreach ($request->answers as $answer) {
             $answersIds [] = Answer::create($answer)->id; // Save each answer.
         } */


        return response()->json([ 'name'=>Input::get('user_name'),
                                'position'=>Input::get('user_position'),
                                'sector'=>Input::get('user_sector'),
                                'email'=>Input::get('user_email'),
                                'phone_num'=>Input::get('phone_num'),
                                'bio'=>Input::get('bio') ]);





    }



    public function deleteExperienceandEducation(Request $request, $id){
        $user=User::findOrFail($id);

        if($request['comp_id']!=null){
            $comp_id=$request['comp_id'];
            $user->companies()->detach($comp_id);
        }
        else{
            $inst_id=$request['inst_id'];
            $user->institutions()->detach($inst_id);
        }
    }

}
