<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedors = Proveedor::all();
        return view('proveedors.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo_electronico' => 'nullable|email|max:255',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedors.index')->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedors.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedors.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'empresa' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo_electronico' => 'nullable|email|max:255',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedors.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedors.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
