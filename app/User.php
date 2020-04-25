<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','staff_id','active','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }
    public function setActiveAttribute($value)
    {
        if ($value != null) {$this->attributes['active']='1';  }
    }

    public function getAvatarAttribute($value)
    {
        return asset('media/avatars').'/'.$value;
    }


    public function ui_user()
    {
        $s="";
        foreach (Auth::user()->uis as $ui)
        {
            $s .= $ui->key . ' ';
        }
        return $s;
    }


    public function uis()
    {
        return $this->belongsToMany('App\Model\Ui');
    }
}
