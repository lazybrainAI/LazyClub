<?php

namespace App\Http\Controllers;

use App\Project_Attending;
use App\SocialNetwork;
use App\SocialUser;
use Illuminate\Http\Request;
use App\User;
use App\Institution;
use App\Title;
use App\Education;
use App\Experience;
use App\Position;
use App\Company;
use Illuminate\Support\Facades\Input;
use App\Team;
use App\Document;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function elementExists($array, $element){

        foreach ($array as $el){
            if($el==$element){
                return true;
            }
        }
        return false;

    }

    public function getUserProjects($user){

        $project_attendings=Project_Attending::where('user_id', $user->id)->get();
        $user_teams=array();
        foreach ($project_attendings as $project_attending){
            array_push($user_teams, $project_attending->team_id);
        }

        $projects=array();
        $teams=array();
        foreach ($user_teams as $user_team){
            if(!$this->elementExists($teams, $user_team)){
                $team=Team::where('id', $user_team)->get()->first();
                array_push($projects, $team->project);
                array_push($teams, $user_team);
            }
            else{
                continue;
            }

        }

        return $projects;

    }


    public function getProjectsTeams($project){

        $team_id=$project->team->id;
        $team=Project_Attending::where('team_id', $team_id)->get();

        return $team;


    }


    public function getProfileDetails($username)
    {

        $user = User::where('username', $username)->get()->first();

        // user's social network links
        $socials = $user->social_users;
        $fb="#";
        $linked="#";
        $twitter="#";

        foreach ($socials as $social){
            $sn=SocialNetwork::where('id', $social->sn_id)->get()->first();
            if ($sn->name == 'facebook') {
                $fb = $social->URL;
            }
            if ($sn->name == 'twitter') {
                $twitter = $social->URL;
            }

            if($sn->name == 'linkedin'){
                $linked = $social->URL;

            }

        }

        //user's projects

        $projects=$this->getUserProjects($user);

        //teams
        $teams=array();
        foreach ($projects as $project){
            $teams[$project->name]= $this->getProjectsTeams($project);
        }


        //user's company
        $experiences=$user->experiences;
        $experience_count=$experiences->count();

        //user's education
        $educations=$user->educations;
        $education_count=$educations->count();

        //user's documents

        $documents=Document::where('user_id', $user->id)->get();

        $page_name="profile";
        $button="";
        return view('profile', compact('documents','button','user', 'fb' , 'twitter', 'linked', 'projects', 'experiences', 'teams','experience_count','educations', 'education_count', 'page_name'));
    }


    private function createTable( $model, $column_value){

        $table = new $model;
        $table->name = $column_value;
        $table->save();
        return $table->id;
    }

    private function createORupdateEduExp($user, $ids_array_1, $ids_array_2, $main_ids_array, $count, $model1,  $model2,  $main_model, $input_name_1_part, $input_name_2_part){

        $new_main_ids=array();

        for ($i = 0; $i < $count; $i++) {

            $input_name_1 = $input_name_1_part . trim($main_ids_array[$i]);
            $input_name_2 = $input_name_2_part . trim($main_ids_array[$i]);
            $input_value_1 =Input::get($input_name_1);
            $input_value_2 = Input::get($input_name_2);
            $table_rows_1 = $model1::where('name', $input_value_1)->get();
            $table_rows_2 = $model2::where('name', $input_value_2)->get();


            if ($table_rows_1->isEmpty()) {
                //create institution
                if($model1==Institution::class){
                    $ids_array_1[]=$this->createTable(Institution::class, $input_value_1);
                }
                else{
                    $ids_array_1[]=$this->createTable(Company::class, $input_value_1);
                }

            }
            if ($table_rows_2->isEmpty()) {
                //create title if doesn't exist
                if($model2==Title::class) {
                    $ids_array_2[] = $this->createTable(Title::class, $input_value_2);;
                }
                else{
                    $ids_array_2[] = $this->createTable(Position::class, $input_value_2);
                }


            } else { //rows exist
                foreach($table_rows_1 as $table_row_1){
                    $ids_array_1[] = $table_row_1->id;

                }
                foreach($table_rows_2 as $table_row_2){
                    $ids_array_2[] = $table_row_2->id;

                }


            }

        }

        //iterate through educations ids and update/create new eudcation record

        for ($j = 0; $j < $count; $j++) {

            if($main_model==Education::class) {
                $from = "from_period_education_" . $main_ids_array[$j];
                $to = "to_period_education_" . $main_ids_array[$j];
                $start_date = Input::get($from);
                $end_date = Input::get($to);

                $main_model_rows = $main_model::where('id', $main_ids_array[$j])->where('user_id', $user->id)->get();

                if($main_model_rows->isEmpty()) {

                $new_main_row = Education::create([ 'start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $user->id, 'institution_id' => $ids_array_1[$j], 'title_id' => $ids_array_2[$j] ]);
                $new_main_ids[$main_ids_array[$j]] = $new_main_row->id;

                }

                else{
                    Education::where('id', $main_ids_array[$j])->update(['start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $user->id, 'institution_id' => $ids_array_1[$j], 'title_id' => $ids_array_2[$j] ]);

                }
            }


            if($main_model==Experience::class){
                $from = "from_period_experience_" . $main_ids_array[$j];
                $current_work="current_work_".$main_ids_array[$j];
                $present=Input::get($current_work);
                $start_date = Input::get($from);
                $to = "to_period_experience_" . $main_ids_array[$j];
                $end_date = Input::get($to);

                if( $end_date=="present" ) {
                    $end_date=Carbon::now()->addYear(10);
                }

                $description_name = "description_" . $main_ids_array[$j];
                $description = Input::get($description_name);

                $main_model_rows = $main_model::where('id', $main_ids_array[$j])->where('user_id', $user->id)->get();


                if( $main_model_rows->isEmpty()) {

                    $new_main_row=Experience::create(['start_date' => $start_date, 'end_date' => $end_date, 'description' => $description, 'user_id' => $user->id, 'company_id' => $ids_array_1[$j], 'position_id' => $ids_array_2[$j]]);
                    $new_main_ids[$main_ids_array[$j]] = $new_main_row->id;
                }
                else{
                    Experience::where('id', $main_ids_array[$j])->update(['start_date' => $start_date, 'end_date' => $end_date, 'description' => $description, 'user_id' => $user->id, 'company_id' => $ids_array_1[$j], 'position_id' => $ids_array_2[$j]]);

                }

            }


        }

        return $new_main_ids;

    }




    public function editProfile(Request $request, $username)
    {
        $user = User::where('username', $username)->get()->first();
/*
        $user->name = $request['user_name'];
        $user->surname = $request['surname'];
        $user->position = $request['user_position'];
        $user->sector = $request['user_sector'];
        $user->email = $request['user_email'];
        $user->phone_num = $request['phone_num'];
        $user->bio = $request['bio'];
        $user->update();

        //social networks
        $socials=array();

        $socials['facebook']=$request['facebook'];
        $socials['linkedin']=$request['linkedin'];
        $socials['twitter']=$request['twitter'];

        foreach($socials as $name=>$social){
            $sn=SocialNetwork::where('name', $name)->get()->first();
            if($social!=""){
                $social_user=SocialUser::where('user_id', $user->id)->where('sn_id', $sn->id)->get();//Social_user table
                if($social_user->isEmpty()){
                   SocialUser::create(['user_id'=>$user->id, 'sn_id'=>$sn->id, 'URL'=>$social]);
                }
                else{
                    $social_user->URL=$social;
                    $social_user->update();
                }
            }
        } */



        // data about education and experience
        $new_ed_ids=null;
        $new_exp_ids=null;

        // ------------ education data ----------------

        if($request->ed_ids!=null) {

            $ed_ids = explode(",", $request->ed_ids);
            $insts_id = array();
            $titles_id = array();
            $count = count($ed_ids);

            $new_ed_ids=$this->createORupdateEduExp($user, $insts_id, $titles_id, $ed_ids, $count, Institution::class, Title::class, Education::class, "institution_", "title_");

        }

        // ------------ experience data ----------------

        if($request->exp_ids!=null) {
            $exp_ids = explode(",", $request->exp_ids);
            $companies_id=array();
            $positions_id=array();
            $count_exp = count($exp_ids);

            $new_exp_ids=$this->createORupdateEduExp($user, $companies_id, $positions_id, $exp_ids, $count_exp, Company::class, Position::class, Experience::class, "company_name_", "company_position_");

        }

        return response()->json(['new_ed_ids'=>$new_ed_ids, 'new_exp_ids'=>$new_exp_ids]);

    }



    public function deleteExperienceandEducation(Request $request, $username){

        $user=User::where('username', $username)->get()->first();

        if($request['experience_id']!=null){ //delete experience
            $experience_id=$request['experience_id'];
            $experience=Experience::where('id',$experience_id)->where('user_id', $user->id)->get();
            if(!$experience->isEmpty()) {
                $experience->first()->delete();

            }
        }
        else{
            $education_id=$request['education_id'];
            $education=Education::where('id',$education_id)->where('user_id', $user->id)->get();
            if(!$education->isEmpty()) {
                $education->first()->delete();

            }
        }
    }



    public function uploadProfileImage(Request $request, $username){

        $user=User::where('username', $username)->get()->first();

        if($request->hasFile('image')){

            $this->validate($request, [

                'image' => 'required|mimes:png,jpg,jpeg||max:2048',

            ],
            [   'image.mimes'=>'Not a valid image format',
                'image.max'=>'Image is too big'

            ]);

            $extension = $request->file('image')->getClientOriginalExtension();
            $dir = 'img/'.$user->id.'/profile/';
            $filename=time().'.'.$extension;

            $request->file('image')->move($dir, $filename);

            $user->photo_link=$dir.$filename;
            $user->save();

            $msg="Saved";

            return response()->json(['msg'=>$msg, 'photo'=>$dir.$filename]);

        }

        else{

            $msg="Not an image";
            return response()->json(['msg'=>$msg]);

        }



    }

}
