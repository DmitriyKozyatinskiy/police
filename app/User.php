<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
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
     * The patrols that belong to the user.
     */
    public function patrols()
    {
        return $this->belongsToMany('App\Patrol');
    }

    /**
     * The protocols that belong to the user.
     */
    public function protocols()
    {
        return $this->hasMany('App\Protocol');
    }
}
