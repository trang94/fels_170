<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Word;
use App\Models\Category;
use App\Models\Anwser;
use App\Http\Controllers\Controller;

class WordController extends Controller
{
    public function index()
    {
        $words = Word::paginate(config('settings.paginate.words'));
        return view('admin.word.index', ['words' => $words]);
    }

    public function edit(Word $word)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|between:1,255|unique:words',
            'category_id' => 'required',
            'is_anwser' => 'required'
        ]);
        foreach ($request->anwsers as $anwser) {
            if ($anwser == '') {
                return redirect('admin/word/create')->withErrors(trans('messages.anwser_error'));
            }
        }

        $word = new Word();
        $word->content = $request->content;
        $word->category_id = $request->category_id;
        $word->save();
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

        return redirect('/admin/word');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.word.create', compact('categories'));
    }

    public function update(Word $word,Request $request)
    {

    }

    public function destroy(Word $word)
    {

    }
}
