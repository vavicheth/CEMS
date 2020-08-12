<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    //Add extra attribute
    protected $attributes = ['name_parent'];

    //Make it available in the json response
    protected $appends = ['name_parent'];

    //implement the attribute
    public function getNameParentAttribute()
    {
        $text=$this->name_kh. ', '. $this->province['type_kh']. $this->province['name_kh'];
        return $text;
    }


    public function province()
    {
        return $this->belongsTo(Province::class,'province_code','code');
    }

    public function communes()
    {
        return $this->hasMany(Commune::class,'district_code','code');
    }

    public function villages()
    {
//        return $this->hasManyThrough(Village::class,Commune::class,'district_code','commune_code','code','code');
        return $this->hasMany(Village::class,'district_code','code');
    }
}
