<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    
    protected $fillable=['address','village_code','commune_code','district_code','province_code'];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function village()
    {
        return $this->hasOne(Village::class,'village_code','code');
    }
    public function commune()
    {
        return $this->hasOne(Commune::class,'commune_code','code');
    }
    public function district()
    {
        return $this->hasOne(District::class,'district_code','code');
    }
    public function province()
    {
        return $this->hasOne(Province::class,'province_code','code');
    }


    public function getVillageNameAttribute($value)
    {
        $name=Village::where('code',$this->attributes['village_code'])->first();
        return $name->name . " ". $name->type;
    }
    public function getVillageNameKhAttribute($value)
    {
        $name=Village::where('code',$this->attributes['village_code'])->first();
        return $name->type_kh . " ". $name->name_kh;
    }
    public function getCommuneNameAttribute($value)
    {
        $name=Commune::where('code',$this->attributes['commune_code'])->first();
        return $name->name . " ". $name->type;
    }
    public function getCommuneNameKhAttribute($value)
    {
        $name=Commune::where('code',$this->attributes['commune_code'])->first();
        return $name->type_kh . " ". $name->name_kh;
    }
    public function getDistrictNameAttribute($value)
    {
        $name=District::where('code',$this->attributes['district_code'])->first();
        return $name->name . " ". $name->type;
    }
    public function getDistrictNameKhAttribute($value)
    {
        $name=District::where('code',$this->attributes['district_code'])->first();
        return $name->type_kh . " ". $name->name_kh;
    }
    public function getProvinceNameAttribute($value)
    {
        $name=Province::where('code',$this->attributes['province_code'])->first();
        return $name->name . " ". $name->type;
    }
    public function getProvinceNameKhAttribute($value)
    {
        $name=Province::where('code',$this->attributes['province_code'])->first();
        return $name->type_kh . " ". $name->name_kh;
    }

}
