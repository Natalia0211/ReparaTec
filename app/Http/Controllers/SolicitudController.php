<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Cliente;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    // Método para listar todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::with('cliente', 'dispositivo')->get();
        return view('solicituds.index', compact('solicitudes'));
    }

    // Método para mostrar el formulario de creación de una nueva solicitud
    public function create()
    {
        $clientes = Cliente::all();
        $dispositivos = Dispositivo::all();
        return view('solicituds.create', compact('clientes', 'dispositivos'));
    }

    // Método para almacenar una nueva solicitud
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'dispositivo_id' => 'required|exists:dispositivos,id',
            'fecha_solicitud' => 'required|date',
            'descripcion_problema' => 'required|string|max:255',
        ]);

        Solicitud::create($request->all());

        return redirect()->route('solicituds.index')->with('success', 'Solicitud creada exitosamente.');
    }

    // Método para mostrar el formulario de edición de una solicitud
    public function edit(Solicitud $solicitud)
    {
        $clientes = Cliente::all();
        $dispositivos = Dispositivo::all();
        return view('solicituds.edit', compact('solicitud', 'clientes', 'dispositivos'));
    }

    // Método para actualizar una solicitud
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'dispositivo_id' => 'required|exists:dispositivos,id',
            'fecha_solicitud' => 'required|date',
            'descripcion_problema' => 'required|string|max:255',
        ]);

        $solicitud->update($request->all());

        return redirect()->route('solicituds.index')->with('success', 'Solicitud actualizada exitosamente.');
    }

    // Método para eliminar una solicitud
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicituds.index')->with('success', 'Solicitud eliminada exitosamente.');
    }
}
