<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    /**
     * Get the notes for the recruiter.
     */
    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    /**
     * Get the company that owns the recruiter.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the user that owns the recruiter.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
