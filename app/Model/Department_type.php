<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department_type extends Model
{
    protected $fillable=['code','name','description','active'];


    public function departments()
    {
        return $this->hasMany(Department::class,'department_type_id');
    }

}
