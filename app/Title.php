<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    //
    public function studies(){
        return $this->hasMany('App\Study');
    }

    public function employments(){
        return $this->hasMany('App\Employment');
    }
}
