<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = "assign";
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
