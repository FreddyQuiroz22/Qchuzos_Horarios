<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros', function (Blueprint $table) {
            // Asegúrate de que la columna tenga la fecha actual como valor por defecto
            $table->date('fecha')->default(DB::raw('CURRENT_DATE'))->after('hora');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->dropColumn('fecha'); // Eliminar la columna 'fecha' si se revierte la migración
        });
    }
};
