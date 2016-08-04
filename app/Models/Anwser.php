<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anwser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anwsers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['word_id', 'content', 'is_correct',];

    public function word()
    {
        return $this->belongsTo('App\Models\Word');
    }
}
