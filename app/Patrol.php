<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrol extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password', 'role',
//    ];

    /**
     * The users that belong to the patrol.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Get the protocols of this patrol
     */
    public function protocols()
    {
        return $this->hasMany('App\Protocol');
    }
}
