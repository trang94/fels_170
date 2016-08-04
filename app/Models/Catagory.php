<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description',];

    public function words()
    {
        return $this->hasMany('App\Models\Word');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
