<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    //

    protected $fillable=['name', 'address'];

    public function educations(){
        return $this->hasMany('App\Education');
    }


    public function experiences(){
        return $this->hasMany('App\Experience');
    }
}
