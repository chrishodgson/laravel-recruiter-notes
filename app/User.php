<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the companies for the user.
     */
    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    /**
     * Get the recruiters for the user.
     */
    public function recruiters()
    {
        return $this->hasMany('App\Recruiter');
    }

    /**
     * Get the notes for the user.
     */
    public function notes()
    {
        return $this->hasMany('App\Note');
    }
}
