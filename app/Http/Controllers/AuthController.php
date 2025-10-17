<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validación simple de login
        if ($request->username === 'admin' && $request->password === 'admin') {
            return response()->json(['message' => 'Autenticación exitosa'], 200);
        }

        return response()->json(['error' => 'No autorizado'], 401);
    }

    public function logout()
    {
        return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }
}
