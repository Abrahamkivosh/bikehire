<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('admins.users.index', compact('users'));
    }
    public function create()
    {
        return view('admins.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        Session::flash('success', 'User created successfully');
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        //
    }
    public function edit(User $user)
    {
        return view('admins.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
        ]);
        Session::flash('success', 'User updated successfully');
        return redirect()->route('users.index');
    }
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', 'User deleted successfully');
        return redirect()->route('users.index');
    }
    public function editUser(User $user)
    {
        return view('users.profile.edit', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'phone' => 'required',
            'national_id' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'phone' => $request->phone,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
        ]);
        Session::flash('success', 'User updated successfully');
        return redirect()->route('home', $user->id);
    }
}
