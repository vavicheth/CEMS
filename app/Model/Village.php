<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
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

    public function commune()
    {
        return $this->belongsTo(Commune::class,'commune_code','code');
    }

    public function district()
    {
//        return $this->hasManyDeep(District::class,[Commune::class],['code','code'],['commune_code','district_code']);
        return $this->belongsTo(District::class,'district_code','code');
    }

    public function province()
    {
//        return $this->hasManyDeep(Province::class,[Commune::class,District::class],['code','code','code'],['commune_code','district_code','province_code']);
        return $this->belongsTo(Province::class,'province_code','code');
    }

}
