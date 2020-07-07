<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class Patient extends Model implements HasMedia
{
    use SoftDeletes,CascadesDeletes;
    use HasMediaTrait;

    protected $fillable = [
        'hn', 'name', 'name_kh','id_card', 'gender', 'dob', 'address', 'phone', 'active', 'description','department_id'
    ];

    protected $cascadeDeletes=['patient_accompanies','hasaddress'];

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

    public function setActiveAttribute($value)
    {
        if ($value != null || $value != "") {
            $this->attributes['active'] = '1';
        }else{
            $this->attributes['active'] = '0';
        }
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-M-Y H:i:s');
    }

    public function patient_accompanies()
    {
        return $this->hasMany(PatientAccompany::class,'patient_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function hasaddress()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    /**
     * Media File
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('patient_photo')
        ->useDisk('public')
        ->singleFile()
        ->useFallbackPath(public_path('/default.png'));

        $this->addMediaCollection('patient_id_card')
            ->useDisk('public')
            ->singleFile()
            ->useFallbackPath(public_path('/default.png'));
    }



}
