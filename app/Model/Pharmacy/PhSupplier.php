<?php

namespace App\Model\Pharmacy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use DateTimeInterface;

class PhSupplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'abr','phone','contact_name','address','email','website','country','description','active','donor_id'
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

    public function donor()
    {
        return $this->belongsTo(PhDonor::class);
    }
}
