<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Vista para mostrar el formulario de inicio de sesión
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('/dashboard'); // Redirige a la página deseada después del inicio de sesión
        }

        // Autenticación fallida
        return redirect()->back()->withErrors(['email' => 'Las credenciales proporcionadas son incorrectas']); // Mensaje de error
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirige a la página de inicio de sesión después de cerrar sesión
    }
}
