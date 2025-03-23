<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registros;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class RegistroController  extends Controller
{
    public function marcarAsistencia(Request $request)
    {
        $horaActual = date('H:i:s'); // Obtener la hora con PHP
        $fechaActual = date('Y-m-d'); // Obtener la fecha con PHP
        
        //dd($horaActual, $fechaActual); // Verifica que la hora se está generando bien

        if (Carbon::createFromFormat('H:i:s', $horaActual)->between(Carbon::createFromFormat('H:i:s', '06:00:00'), Carbon::createFromFormat('H:i:s', '17:15:59'))) {
            $tipo = 'Entrada';
        } else {
            $tipo = 'Salida';
        }
        
        DB::table('registros')->insert([
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'fecha' => $fechaActual,
            'hora' => $horaActual,
            'tipo' => $tipo,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //dd($horaActual);

    
        return redirect()->back()->with('success', 'Asistencia registrada correctamente');
    }

}