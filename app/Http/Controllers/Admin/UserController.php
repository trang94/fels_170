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

    public function destroy(User $user)
    {
        if ($user == NULL) {
            return redirect('/admin/user')->with('message', 'Not Exist');
        }

        $user -> delete();
        return redirect('/admin/user')->with('message', 'Delete successful');
    }

}
