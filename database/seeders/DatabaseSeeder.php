<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Dispositivo;
use App\Models\Solicitud;
use App\Models\Empleado;
use App\Models\Reparacion;
use App\Models\Factura;
use App\Models\Pago;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear categorías
        $categorias = Categoria::factory(10)->create();
        
        // Crear proveedores
        $proveedores = Proveedor::factory(10)->create();
        
        // Crear productos asociados a categorías y proveedores
        foreach ($proveedores as $proveedor) {
            Producto::factory(10)->create([
                'proveedor_id' => $proveedor->id,
                'categoria_id' => $categorias->random()->id,
            ]);
        }
        
        // Crear clientes
        $clientes = Cliente::factory(100)->create();

        // Crear empleados
        $empleados = Empleado::factory(5)->create();
        
        // Asociar dispositivos a clientes
        foreach ($clientes as $cliente) {
            $dispositivo = Dispositivo::factory()->create([
                'cliente_id' => $cliente->id,
            ]);

            // Crear solicitudes asociadas al cliente y su dispositivo
            $solicitud = Solicitud::factory()->create([
                'cliente_id' => $cliente->id,
                'dispositivo_id' => $dispositivo->id,
            ]);

            // Crear reparaciones asociadas a la solicitud y un empleado
            $reparacion = Reparacion::factory()->create([
                'solicitud_id' => $solicitud->id,
                'empleado_id' => $empleados->random()->id,
            ]);

            // Crear facturas asociadas a la solicitud
            $factura = Factura::factory()->create([
                'solicitud_id' => $solicitud->id,
            ]);

            // Crear pagos asociados a la factura
            Pago::factory()->create([
                'factura_id' => $factura->id,
            ]);
        }

        // Crear un usuario administrador
        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
        ]);
    }
}
