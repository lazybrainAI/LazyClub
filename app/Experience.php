<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }
}
