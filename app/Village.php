<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    public function commune()
    {
        return $this->belongsTo(Commune::class,'commune_code','code');
    }

    public function district()
    {
        return $this->hasManyDeep(District::class,[Commune::class],['code','code'],['commune_code','district_code']);
    }

    public function province()
    {
        return $this->hasManyDeep(Province::class,[Commune::class,District::class],['code','code','code'],['commune_code','district_code','province_code']);
    }
}
