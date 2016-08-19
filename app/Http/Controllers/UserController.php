<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $followers = $user->followers;
        $following = $user->following;
        return view('user.show')->with([
            'user' => $user,
            'followers' => $followers,
            'following' => $following
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($id == $user->id) {
            return view('user.edit')->with('user', $user);
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        if ($user == NULL) {
            return redirect('/');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect(url("/user/$request->id"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getFollowing(User $user)
    {
        if ($user == NULL) {
            return redirect('/');
        } else {
            $followers = $user->followers;
            $following = $user->following;
            return view('relationship.following', [
                'user' => $user,
                'following' => $following,
                'followers' => $followers
            ]);
        }
    }

    public function getFollowers(User $user)
    {
        if ($user == NULL) {
            return redirect('/');
        } else {
            $followers = $user->followers;
            $following = $user->following;
            return view('relationship.followers', [
                'user' => $user,
                'following' => $following,
                'followers' => $followers
            ]);
        }
    }
}
