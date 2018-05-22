<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    //
    public function social_users(){

        return $this->hasMany('App\SocialUser'); //looks for a foreign key in SocialUser Model
    }
}
