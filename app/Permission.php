<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Permission extends \Spatie\Permission\Models\Permission
{
    use SoftDeletes;

    public $table = 'permissions';

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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');
    }
}
