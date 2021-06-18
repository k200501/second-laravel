<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ROLE_ADMIN='admin';
    const ROLE_USER = 'user';
    protected $fillable = [
        'name', 'email', 'password','role',
    ];
// User抓取UserClient裡的user_id的位子，laravel通常會預設關聯到id，所以第二㯗可填可不填
    public function client(){
        return $this->hasone('App\UserClient','user_id');
    }

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
}
