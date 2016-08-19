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
    const ROLE_MEMBER = 0;
    const ROLE_ADMIN = 1;
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

    public function relationship_with($user)
    {
        return Relationship::where('follower_id', $this->id)->where('followed_id', $user->id)->get()->first();
    }

    public function isAdmin()
    {
        return ($this->is_admin == User::ROLE_ADMIN);
    }
}
