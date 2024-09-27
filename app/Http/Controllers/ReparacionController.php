<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    // Mostrar la lista de reparaciones
    public function index()
    {
        $reparacions = Reparacion::all();
        return view('reparacions.index', compact('reparacions'));
    }

    // Mostrar el formulario para crear una nueva reparación
    public function create()
    {
        return view('reparacions.create');
    }

    // Almacenar una nueva reparación
    public function store(Request $request)
    {
        $request->validate([
            'solicitud_id' => 'required|integer',
            'empleado_id' => 'required|integer',
            'fecha_reparacion' => 'required|date',
            'costo_reparacion' => 'required|numeric|min:0',
        ]);

        Reparacion::create($request->all());
        
        return redirect()->route('reparacions.index')->with('success', 'Reparación creada exitosamente.');
    }

    // Mostrar el formulario para editar una reparación existente
    public function edit(Reparacion $reparacion)
    {
        return view('reparacions.edit', compact('reparacion'));
    }

    // Actualizar una reparación existente
    public function update(Request $request, Reparacion $reparacion)
    {
        $request->validate([
            'solicitud_id' => 'required|integer',
            'empleado_id' => 'required|integer',
            'fecha_reparacion' => 'required|date',
            'costo_reparacion' => 'required|numeric|min:0',
        ]);

        $reparacion->update($request->all());
        
        return redirect()->route('reparacions.index')->with('success', 'Reparación actualizada exitosamente.');
    }

    // Eliminar una reparación
    public function destroy(Reparacion $reparacion)
    {
        $reparacion->delete();
        return redirect()->route('reparacions.index')->with('success', 'Reparación eliminada exitosamente.');
    }
}
