<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = [
        'name', 'details', 'email', 'mobile', 'landline', 'linkedin', 'notify_when_available',
    ];

    /**
     * Get the notes for the recruiters.
     */
    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    /**
     * Get the company that owns the recruiters.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the user that owns the recruiters.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
