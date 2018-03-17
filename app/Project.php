<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    public function reviews(){
        return $this->hasMany('App\Review');
        }
    public function documents(){
        return $this->hasMany('App\Review');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }
    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function actions(){
        return $this->hasMany('App\Action');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }




}
