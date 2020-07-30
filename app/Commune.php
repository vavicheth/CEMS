<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    //Add extra attribute
    protected $attributes = ['name_parent'];

    //Make it available in the json response
    protected $appends = ['name_parent'];

    //implement the attribute
    public function getNameParentAttribute()
    {
        $text=$this->name_kh. ', '. $this->district['type_kh']. $this->district['name_kh']. ', '. $this->province['type_kh']. $this->province['name_kh'];
        return $text;
    }

    public function villages()
    {
        return $this->hasMany(Village::class,'commune_code','code');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_code','code');
    }

    public function province()
    {
//        return $this->hasManyDeep(Province::class,[District::class],['code','code'],['district_code','province_code']);
        return $this->belongsTo(Province::class,'province_code','code');
    }
}
