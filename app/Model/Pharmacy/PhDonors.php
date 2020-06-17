<?php

namespace App\Model\Pharmacy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;
use Illuminate\Support\Str;

class PhDonors extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'abr','description','active'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['Name']=Str::title($value);
    }

    public function setActiveAttribute($value)
    {
        if ($value != null || $value != "") {
            $this->attributes['active'] = '1';
        }else{
            $this->attributes['active'] = '0';
        }
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');
    }
}
