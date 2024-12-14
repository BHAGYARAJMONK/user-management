<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
class UserController extends Controller
{
            public function index()
        {
            $users = User::all();
            //print_r($users);
            return Inertia::render('Users', ['users' => $users]);
        }
        public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            return Inertia::location(route('users.index')); 
        }
                public function edit(User $user)
        {
            return Inertia::render('UserForm', ['user' => $user]);
        }

        public function update(Request $request, User $user)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);

            $user->update($validated);

            return redirect()->route('users.index');
        }

        public function destroy(User $user)
        {
            $user->delete();

            return redirect()->route('users.index');
        }


       






}
