<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['address','village_code','commune_code','district_code','province_code'];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function village()
    {
        return $this->hasOne(Village::class,'village_code','code');
    }

    public function getVillageNameAttribute($value)
    {
        $name=Village::where('code',$this->attributes['village_code'])->first();
        return $name->type_kh . " ". $name->name_kh;
    }



}
