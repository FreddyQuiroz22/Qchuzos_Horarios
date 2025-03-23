<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Maneja el login de los usuarios.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validar las credenciales
        if (Auth::attempt($credentials)) {
            // Si las credenciales son correctas, redirigir al panel de administración
            return redirect()->route('admin.dashboard');
        }

        // Si las credenciales son incorrectas, redirigir de nuevo al login con mensaje de error
        throw ValidationException::withMessages([
            'email' => ['Las credenciales no coinciden con nuestros registros.'],
        ]);
    }

    /**
     * Cerrar sesión y redirigir al login.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login'); // Redirige al login
    }
}
