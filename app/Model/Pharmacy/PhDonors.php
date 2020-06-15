<?php

namespace App\Model\Pharmacy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhDonors extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'abr','description','active'
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
