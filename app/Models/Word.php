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

    public function newAnswer($request, $word)
    {
        if ($request->anwsers != null) {
            foreach ($request->anwsers as $key => $value) {
                settype($key,'string');
                if ($request->is_anwser == $key) {
                    $is_correct = true;
                } else {
                    $is_correct = false;
                }

                Anwser::create([
                    'content' => $value,
                    'word_id' => $word->id,
                    'is_correct' => $is_correct,
                ]);
            }
        }
    }

    public function updateAnswer($request)
    {
        foreach ($request->anwsers_update as $key => $value) {
            $id = $request->anwser_ids[$key];
            settype($id, 'integer');
            $anwser = Anwser::find($id);
            settype($key,'string');
            if ($request->is_anwser == $key) {
                $is_correct = true;
            } else {
                $is_correct = false;
            }

            $anwser->content = $value;
            $anwser->is_correct = $is_correct;
            $anwser->save();
        }
    }

    public function checkError($request)
    {
        if ($request->anwsers != null) {
            foreach ($request->anwsers as $anwser) {
                if ($anwser == '') {
                    return redirect('admin/word/edit')->withErrors(trans('messages.anwser_error'));
                }
            }
        }
    }
}
