<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     //get index user
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(User $user,Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:3,255',
            'email' => 'required|between:3,255|unique:users,email,' . $user->id,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->role,
        ]);
        return redirect('/admin/user/')->with('success','Updated');
    }

    public function destroy(User $user)
    {
        if ($user == NULL) {
            return redirect('/admin/user')->with('message', 'Not Exist');
        }

        $user -> delete();
        return redirect('/admin/user')->with('success', 'Delete successful');
    }

}
