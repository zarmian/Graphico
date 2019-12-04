<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chat";
    
    public function user()
    {
        return $this->belongsTo('App\User','u_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Project','p_id');
    }

}
