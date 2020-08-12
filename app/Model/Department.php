<?php

namespace App\Model;

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

    public function department_type()
    {
        return $this->belongsTo(Department_type::class,'department_type_id');
    }

}
