<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Anwser;
use App\Models\Word;
use App\Http\Controllers\Controller;

class AnwserController extends Controller
{
    public function destroy(Anwser $anwser, Request $request)
    {
        $anwser -> delete();
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'anwser_id' => $anwser->id
            ]);
        }
    }
}
