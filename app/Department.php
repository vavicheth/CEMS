<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password','username','staff_id','active','avatar'
    ];




    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');
    }
}
