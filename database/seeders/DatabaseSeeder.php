<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Primero, crea los proveedores y categorías
        $proveedores = Proveedor::factory(100)->create();
        \App\Models\Categoria::factory(10)->create();
        
        // Luego, crea los productos, asegurando que haya proveedores y categorías disponibles
        \App\Models\Producto::factory(100)->create([
            'proveedor_id' => $proveedores->random()->id, // Asigna un proveedor aleatorio
        ]);
        
        // Crea otros modelos según sea necesario
        \App\Models\User::factory(10)->create();
        \App\Models\Dispositivo::factory(100)->create();
        \App\Models\Solicitud::factory(100)->create();
        \App\Models\Empleado::factory(100)->create();
        \App\Models\Reparacion::factory(100)->create();
        \App\Models\Factura::factory(100)->create();
        \App\Models\Pago::factory(100)->create();
    
        \App\Models\User::factory()->create([
             'name' => 'Administrador',
             'email' => 'admin@email.com',
         ]);
    }
}
