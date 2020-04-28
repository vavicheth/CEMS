<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

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


    public function getAvatarUriAttribute($value)
    {
        if ($value != null){
            return asset('media/avatars').'/'.$this->attributes['avatar'];
        }else{
            return asset('media/avatars').'/'.'default.png';
        }
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
