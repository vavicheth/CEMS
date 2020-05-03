<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'name_kh', 'abr','abr_kh','bed_total','active','description'
    ];

    public function setActiveAttribute($value)
    {
        if ($value != null) {$this->attributes['active']='1';  }
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');
    }
}