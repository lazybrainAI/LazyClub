<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemRole extends Model
{
    protected $table = 'system_role';



    public function user(){
        return $this->hasMany('App\User');

    }

}
