<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia; // Asegúrate de importar el modelo correcto
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
        // Método para mostrar el login
        public function mostrarLogin()
        {
            return view('login');  // Asegúrate de que la vista 'login' exista
        }
    
        public function login(Request $request)
        {
            // Validar las credenciales
            $credentials = $request->only('email', 'password');
    
            // Intentar autenticar al usuario
            if (Auth::attempt($credentials)) {
                // Si las credenciales son correctas, redirigir al panel de administración
                return redirect()->intended('/admin/dashboard'); // Ruta al panel de administración
            }
    
            // Si las credenciales son incorrectas, redirigir de nuevo al login con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
        public function dashboard(Request $request)
    {
        // Obtener registros (con o sin filtros)
        $query = Asistencia::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('cedula')) {
            $query->where('cedula', $request->cedula);
        }

        $registros = $query->orderBy('hora', 'Asc')->get();

        // Calcular el total de horas trabajadas
        $totalHoras = $this->calcularTotalHoras($registros);

        return view('admin', compact('registros', 'totalHoras'));
    }

        

    private function calcularTotalHoras($registros)
{
    $minutosTotales = 0;
    $entrada = null;

    foreach ($registros as $registro) {
        // Si es una entrada, guardamos la hora de entrada
        if ($registro->tipo === 'entrada') {
            $entrada = strtotime($registro->fecha . ' ' . $registro->hora); // Convertimos la hora a timestamp
        }

        // Si es una salida, calculamos la diferencia con la entrada
        if ($registro->tipo === 'salida' && $entrada !== null) {
            $salida = strtotime($registro->fecha . ' ' . $registro->hora); // Convertimos la salida a timestamp
            // Sumar la diferencia entre la salida y la entrada en minutos
            $minutosTotales += ($salida - $entrada) / 60; // Convertimos la diferencia de segundos a minutos
            $entrada = null; // Restablecemos la entrada, porque ya hemos calculado la diferencia
        }
    }

    // Devolver el total de minutos trabajados
    return round($minutosTotales, 2);
}


}
