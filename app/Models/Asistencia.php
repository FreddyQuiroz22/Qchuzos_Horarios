<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'registros'; // Asegúrate de que la tabla se llame 'asistencias' en la base de datos

    // Campos que son asignables en masa
    protected $fillable = [
        'nombre',  // El nombre del empleado
        'cedula',  // La cédula o identificación
        'fecha',   // La fecha del registro
        'hora',    // La hora registrada
        'tipo',    // El tipo de asistencia (por ejemplo, entrada, salida, etc.)
    ];

    // Si no estás usando las marcas de tiempo (created_at, updated_at)
    public $timestamps = false; // Si tus tablas no tienen los campos created_at/updated_at
}
