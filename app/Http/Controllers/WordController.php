<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Word;

class WordController extends Controller
{
    public function index()
    {
        $words = Word::paginate();
        $word = json_encode($words);
        return view('word.index', ['words' => $words, 'word' => $word]);
    }
}
