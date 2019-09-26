<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'details',
    ];

    /**
     * Get the recruiters for the company.
     */
    public function recruiters()
    {
        return $this->hasMany('App\Recruiter');
    }

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
