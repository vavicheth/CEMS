<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;

class PatientAccompany extends Model  implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = [
        'name', 'gender','id_card', 'phone', 'description','status'
    ];
//    protected $guarded=[];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getGenderAttribute($value)
    {
        return Str::title($value);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('patient_accompany')
            ->useDisk('public')
            ->singleFile()
            ->useFallbackPath(public_path('/default.png'));

        $this->addMediaCollection('patient_accompany_idcard')
            ->useDisk('public')
            ->singleFile()
            ->useFallbackPath(public_path('/default.png'));
    }
}
