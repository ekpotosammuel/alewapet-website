<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        // return $users;

        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::get();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        try {
            $users = new User();
            $users->name                = $request->input('name');
            $users->email               = $request->input('email');
            $users->password            = bcrypt($request->input('password'));
            $users->save();
            if ($request->role_id) {
                UserRole::create([
                    'user_id' => $users->id,
                    'role_id'=> $request->role_id 
                ]);
            }

            return redirect('/users');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));

    }

    public function update(Request $request, $id)
    {

        $users = User::find($id);
        $users->name                = $request->input('name');
        $users->email               = $request->input('email');
        $users->password            = bcrypt($request->input('password'));
        $users->update();
        return redirect('/users')->with('success', 'User Data is successfully updated');
    }
}
