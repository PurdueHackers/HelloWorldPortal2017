<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JWTAuth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getToken() {
        return JWTAuth::fromUser($this, ['exp' => strtotime('+1 year'), 'user_id' => $this->id]);
    }

    public function Application() {
      return $this->hasOne('App\Models\Application');
    }

    public function Roles() {
      return $this->belongsToMany('App\Models\Role');
    }

}
