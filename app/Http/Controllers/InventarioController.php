<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    // Método para mostrar la lista de inventarios
    public function index()
    {
        $inventarios = Inventario::with(['producto', 'proveedor'])->get();
        return view('inventarios.index', compact('inventarios'));
    }

    // Método para mostrar el formulario de creación de un nuevo inventario
    public function create()
    {
        $proveedors = Proveedor::all();
        $productos = Producto::all();
        return view('inventarios.create', compact('proveedors', 'productos'));
    }

    // Método para almacenar un nuevo inventario
    public function store(Request $request)
    {
        $request->validate([

            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedors,id',
        ]);

        Inventario::create($request->all());
        return redirect()->route('inventarios.index')->with('success', 'Inventario creado exitosamente.');
    }

    // Método para mostrar el formulario de edición de un inventario
    public function edit(Inventario $inventario)
    {
        $proveedors = Proveedor::all();
        $productos = Producto::all();
        return view('inventarios.edit', compact('inventario', 'proveedors', 'productos'));
    }

    // Método para actualizar un inventario existente
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedors,id',

        ]);

        $inventario->update($request->all());
        return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente.');
    }

    // Método para eliminar un inventario
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado exitosamente.');
    }
}
