<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function event(){
        return $this->belongsTo('App\Event', 'event_id');
    }
}
