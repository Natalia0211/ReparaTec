<?php

namespace App\Observers;

use App\Models\Inventario;
use App\Models\Producto;

class ProductoObserver
{
    /**
     * Handle the Producto "created" event.
     */
    public function created(Producto $producto): void
    {
        Inventario::create([
            'producto_id' => $producto->id,
            'cantidad' => $producto->cantidad,
            'precio_unitario' => $producto->precio, // Asignamos el precio del producto
            'proveedor_id' => $producto->proveedor_id,
        ]);
    }

    /**
     * Handle the Producto "updated" event.
     */
    public function updated(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "deleted" event.
     */
    public function deleted(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "restored" event.
     */
    public function restored(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "force deleted" event.
     */
    public function forceDeleted(Producto $producto): void
    {
        //
    }
}
