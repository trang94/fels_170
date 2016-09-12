<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Lesson;
use App\Models\Word;
use Auth;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $words = Word::orderBy(\DB::raw('RAND()'))->limit(config('settings.paginate.lesson_word'))->get();
        return view('lesson.show', compact('words', 'lesson'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required'
        ]);

        $lesson = $request->user()->lessons()->create([
            'category_id' => $request->category_id,
        ]);

        return redirect(url('lesson/' . $lesson->id));
    }

    public function update()
    {

    }
}
