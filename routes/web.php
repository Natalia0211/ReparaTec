<?php

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
Route::view('/', 'welcome')->name('home');

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
