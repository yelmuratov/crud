<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index()
    {   
        $users = User::paginate(10);
        return view('User.index',['users' => $users]);
    }

    public function create()
    {
        return view('User.create');
    }

    public function store(UserStoreRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('User.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('User.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {       
        // if password is empty, remove it from the request
        if (empty($request->password)) {
            $request->offsetUnset('password');
        }else{
            $request->merge(['password' => bcrypt($request->password)]);
        }
        
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%'.$search.'%')->paginate(5);
        return view('User.index', ['users' => $users]);
    }
}
