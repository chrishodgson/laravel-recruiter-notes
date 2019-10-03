<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'details', 'follow_up', 'recruiter_id',
    ];

    /**
     * Get the recruiter that owns the note.
     */
    public function recruiter()
    {
        return $this->belongsTo('App\Recruiter');
    }
}
