<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'violator', 'victim', 'purpose', 'address'
    ];

    /**
     * The users that belong to the protocol.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the patrol of this protocol.
     */
    public function patrol()
    {
        return $this->belongsTo('App\Patrol');
    }
}
