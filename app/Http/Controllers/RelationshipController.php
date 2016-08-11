<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Relationship;
use Auth;

class RelationshipController extends Controller
{
    //
    public function store(Request $request){
        $relationship = new Relationship;
        $relationship->follower_id = Auth::User()->id;
        $relationship->followed_id = $request->followed_id;
        $relationship->save();
        return redirect('/user/' . $request->followed_id);
    }

    public function destroy($id){
        $relationship = Relationship::find($id);
        $relationship->delete();
        return redirect('/user/' . $relationship->followed_id);
    }
}
