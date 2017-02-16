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
    protected $fillable = [
        'leader', 'city', 'start_date', 'end_date',
    ];

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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_date',
        'end_date'
    ];
}
