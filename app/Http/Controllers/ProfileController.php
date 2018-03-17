<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //


    public function getProfileDetails($id)
    {

        $user = User::all()->find($id);


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

       // dd($fb);



          return view('profile', compact('user', 'fb' , 'twitter', 'linked'));
    }

    public function editProfile(Request $request){
        $user = Auth::user();
        $user->name=$request['name'];
        $user->surname=$request['surname'];
        $user->sector=$request['sector'];
        $user->position=$request['position'];
        $user->email=$request['email'];
        $user->phone_num=$request['phone_num'];
        $user->bio=$request['bio_description'];

        $user->save();




    }

}
