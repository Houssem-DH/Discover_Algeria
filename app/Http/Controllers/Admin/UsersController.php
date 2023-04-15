<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate('8');
        return view('admin.Users.index', [
            'users' => $users,
        ]);
    }


    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.Users.edit', [
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);


        $users->isAdmin = $request->input('isAdmin') == TRUE ? '1' : '0';


        $users->update();
        return redirect()->route('members')->with('status', 'Member Updated Successfully');

    }

    public function destroy($id)
    {
        $users = User::find($id);


        $users->delete();
        return redirect()->route('members')->with('status', 'Member Deleted Successfully');
    }
}