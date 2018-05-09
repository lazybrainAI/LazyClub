<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    // education title

    protected $fillable=['name'];

    public function educations(){
        return $this->hasMany('App\Education');
    }


}
