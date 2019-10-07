<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = [
        'name', 'details', 'email', 'mobile', 'landline', 'linkedin', 'notify_when_available', 'company_id',
    ];

    /**
     * Get the latest notes for the recruiter.
     */
    public function latestNote()
    {
        return $this->notes()->orderBy('updated_at')->take(1);
    }

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
}
