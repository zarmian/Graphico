<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = "competition";
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
