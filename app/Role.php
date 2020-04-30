<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Role extends \Spatie\Permission\Models\Role
{
    use SoftDeletes;

    public $table = 'roles';

//    protected $dates = [
//        'created_at',
//        'updated_at',
//        'deleted_at',
//    ];
//
//    protected $fillable = [
//        'title',
//        'created_at',
//        'updated_at',
//        'deleted_at',
//    ];
//
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');

    }
//
//    public function permissions()
//    {
//        return $this->belongsToMany(Permission::class);
//
//    }
}
