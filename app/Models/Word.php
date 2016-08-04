<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'words';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'category_id',];

    public function anwsers()
    {
        return $this->hasMany('App\Models\Anwser');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
