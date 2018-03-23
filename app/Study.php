<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function institution(){
        return $this->belongsTo('App\Institution');
    }

    public function title(){
        return $this->belongsTo('App\Title');
    }



}
