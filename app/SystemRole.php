<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemRole extends Model
{
    protected $table = 'system_role';

//retrieving sys_role of specified user
    public function sys_role(){

        return $this->hasOne('App\User'); //goes to User and looks for user_id
    }
}
