<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


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
        return $this->hasManyThrough(Village::class,Commune::class,'district_code','commune_code','code','code');
    }
}
