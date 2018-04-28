<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];


    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password', 'remember_token',
    ];
//    public $timestamps = false;
    public function generateToken(){
        $this->remember_token = str_random(60);
        $this->save();
        return $this->remember_token;
    }

    //return user social network
    public function social_network(){

        return $this->hasMany('App\SocialNetwork'); //looks for a foreign key in SocialNetwork Model
    }



    public function system_role(){
        return $this->belongsTo('App\SystemRole');
    }

    public function teams(){
        return $this->belongsToMany('App\Team');
    }

    public function educations(){
        return $this->hasMany('App\Education');
    }

    public function experiences(){
        return $this->hasMany('App\Experience');
    }

    public function reviews(){
        return $this->belongsToMany('App\Review');
    }

    public function documents(){
        return $this->belongsToMany('App\Document');
    }


    public function actions(){
        return $this->hasMany('App\Action');
    }


    public function event_attendings(){

        return $this->hasMany('App\Event_Attending');
    }

    public function project_attendings(){

        return $this->hasMany('App\Project_Attending');
    }
}
