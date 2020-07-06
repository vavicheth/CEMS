<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

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
        return $this->hasManyDeep(Province::class,[District::class],['code','code'],['district_code','province_code']);
    }
}
