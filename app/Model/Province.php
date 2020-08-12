<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


    public function districts()
    {
        return $this->hasMany(District::class,'province_code','code');
    }

    public function communes()
    {
//        return $this->hasManyThrough(Commune::class,District::class,'province_code','district_code','code','code');
        return $this->hasMany(Commune::class,'province_code','code');
    }

//    public function villages()
//    {
//        return $this->hasManyDeep(Village::class,[District::class,Commune::class],['province_code','district_code','commune_code'],['code','code','code']);
//    }

    public function villages()
    {
//        return $this->hasManyDeepFromRelations($this->communes(), (new Commune)->villages());
        return $this->hasMany(Village::class,'province_code','code');
    }

}
