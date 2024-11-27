<?php

use App\Http\Controllers\AutenticaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\SolicitudController;

// Rutas web
Route::view('/','inicio')->name('inicio');

Route::resource('proveedors', ProveedorController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class)->middleware('auth');
Route::resource('inventarios', InventarioController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('dispositivos', DispositivoController::class);
Route::resource('solicituds', SolicitudController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('reparacions', ReparacionController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('pagos', PagoController::class);

Route::get('facturas/{id}/pdf', [FacturaController::class, 'generatePDF'])->name('facturas.pdf');

//Ruta de registro de usuarios
route::view('/registro', 'autenticacion.registro')->name('registro');
route::post('/registro', [AutenticaController::class, 'registro'])->name('registro.store');

//Ruta de login de usuarios
route::view('/login', 'autenticacion.login')->name('login');
route::post('/login', [AutenticaController::class, 'login'])->name('login.store');

//Ruta de logout del usuario
route::post('/logout', [AutenticaController::class, 'logout'])->name('logout');

//Ruta para editar el perfil de usuario
Route::get('/perfil', [AutenticaController::class, 'perfil'])->name('perfil');
Route::put('/perfil/{user}', [AutenticaController::class, 'perfilUpdate'])->name('perfil.update');

//Ruta para cambiar la contraseña de usuario
Route::put('/perfil/password/{user}', [AutenticaController::class, 'passwordUpdate'])->name('password.update');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
