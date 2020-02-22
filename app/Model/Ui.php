<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ui extends Model
{
    protected $guarded=[];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
