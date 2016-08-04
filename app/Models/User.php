<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'avatar', 'is_admin',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    public function following()
    {
        return $this->belongsToMany('App\Models\User', 'relationships', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App\Models\User', 'relationships', 'followed_id', 'follower_id');
    }

    public function followed($user)
    {
        return $this->following()->where('followed_id', $user->id)->exists();
    }
}
