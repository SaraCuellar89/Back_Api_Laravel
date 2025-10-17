<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // GET /users
    public function index()
    {
        return User::all();
    }

    // POST /users
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:126|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Encriptar la contraseña
            'token' => null,
        ]);

        return response()->json($user, 201);
    }

    // GET /users/{id}
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // PUT /users/{id}
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'username' => $request->username ?? $user->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return $user;
    }

    // DELETE /users/{id}
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
