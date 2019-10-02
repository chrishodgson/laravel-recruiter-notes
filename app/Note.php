<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'details', 'follow_up',
    ];

    /**
     * Get the recruiters that owns the note.
     */
    public function recruiter()
    {
        return $this->belongsTo('App\Recruiter');
    }

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
