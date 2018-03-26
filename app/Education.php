<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $guarded=[];
    protected $table='educations';

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
