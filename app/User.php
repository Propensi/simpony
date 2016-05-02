<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'user_ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no_peg', 'email', 'password','role','Dept_name' ,'mgr_id',''
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


        public function assignHg() {
        return $this->belongsToMany('App\User');

    }

    public function assignStaff() {
        return $this->belongsToMany('App\User');

    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
