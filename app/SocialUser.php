<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    //

    protected $table="social_user";
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\User');

    }

    public function social_network(){
        return $this->belongsTo('App\SocialNetwork');

    }

}
