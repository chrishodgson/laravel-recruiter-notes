<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'details',
    ];

    /**
     * Get the recruiter for the company.
     */
    public function recruiters()
    {
        return $this->hasMany('App\Recruiter');
    }
}
