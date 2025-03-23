<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta de logout
Route::post('/logout', function () {
    Auth::logout(); // Cierra la sesión
    return redirect('/'); // Redirige a la página principal o cualquier otra ruta
})->name('logout');


// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta protegida (panel de admin)
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});



Route::get('/admin/login', [AdminController::class, 'mostrarLogin']);
Route::post('/admin/login', [AdminController::class, 'login']); // Aquí es donde se llama al método loginRoute::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Aquí pondremos el panel de administración
})->middleware('auth')->name('admin.dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/filtro', [AdminController::class, 'dashboard']);

Route::post('/marcar-asistencia', [RegistroController::class, 'marcarAsistencia']);


