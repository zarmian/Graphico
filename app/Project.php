<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    
    public function user()
    {
        return $this->belongsTo('App\User','u_id');
    }
    public function competition()
    {
        return $this->hasOne('App\Competition','p_id');
    }
    public function payment()
    {
        return $this->hasOne('App\Payment','p_id');
    }
}

