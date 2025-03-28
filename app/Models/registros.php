<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cedula', 'tipo'];
    protected $casts = [
        'hora' => 'time',
        'fecha' => 'date',
    ];
}

