<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationProject extends Model
{
    //

    protected $table="project_application";
    protected $guarded=[];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
