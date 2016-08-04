<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lesson_id', 'word_id', 'anwser_id',];

    public function word()
    {
        return $this->belongsTo('App\Models\Word');
    }

    public function anwser()
    {
        return $this->belongsTo('App\Models\Anwser');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');	    	
    }
}
