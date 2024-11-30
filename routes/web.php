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

// Rutas accesibles solo para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('proveedors', ProveedorController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('reparacions', ReparacionController::class);
    Route::resource('facturas', FacturaController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('inventarios', InventarioController::class);
});

// Rutas accesibles para todos los usuarios autenticados (tanto admins como usuarios estándar)
Route::middleware('auth')->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::resource('dispositivos', DispositivoController::class);
    Route::resource('solicituds', SolicitudController::class);
    Route::resource('pagos', PagoController::class);

    Route::get('facturas/{id}/pdf', [FacturaController::class, 'generatePDF'])->name('facturas.pdf');
});

// Rutas para el registro, login y logout (sin necesidad de autenticación)
Route::view('/registro', 'autenticacion.registro')->name('registro');
Route::post('/registro', [AutenticaController::class, 'registro'])->name('registro.store');
Route::view('/login', 'autenticacion.login')->name('login');
Route::post('/login', [AutenticaController::class, 'login'])->name('login.store');
Route::post('/logout', [AutenticaController::class, 'logout'])->name('logout');

// Rutas de perfil y cambio de contraseña (solo para usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [AutenticaController::class, 'perfil'])->name('perfil');
    Route::put('/perfil/{user}', [AutenticaController::class, 'perfilUpdate'])->name('perfil.update');
    Route::put('/perfil/password/{user}', [AutenticaController::class, 'passwordUpdate'])->name('password.update');
});

// Ruta de dashboard (requerida para usuarios autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas relacionadas con el perfil de usuario (opcional)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
