<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Cliente; // Asegúrate de tener el modelo Cliente
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    // Mostrar lista de dispositivos
    public function index(Request $request)
    {
        $query = Dispositivo::query();
    
        // Filtrado por cliente
        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', $request->cliente_id);
        }
    
        // Filtrado por modelo
        if ($request->filled('modelo')) {
            $query->where('Modelo', 'like', '%' . $request->modelo . '%');
        }
    
        // Obtener dispositivos filtrados
        $dispositivos = $query->get();
        
        // Obtener todos los clientes
        $clientes = Cliente::all(); 

        // Pasar ambos a la vista
        return view('dispositivos.index', compact('dispositivos', 'clientes'));
    }
    
    // Mostrar formulario para crear un nuevo dispositivo
    public function create()
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        return view('dispositivos.create', compact('clientes'));
    }

    // Almacenar un nuevo dispositivo
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'imei' => 'required|string|max:255|unique:dispositivos',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        Dispositivo::create($request->all());
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo creado exitosamente.');
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $clientes = Cliente::all();
        return view('dispositivos.edit', compact('dispositivo', 'clientes'));
    }

    // Actualizar un dispositivo
    public function update(Request $request, $id)
    {
        $dispositivo = Dispositivo::findOrFail($id);

        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'imei' => 'required|string|max:255|unique:dispositivos,imei,' . $dispositivo->id,
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $dispositivo->update($request->all());
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo actualizado exitosamente.');
    }

    // Eliminar un dispositivo
    public function destroy($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $dispositivo->delete();
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo eliminado exitosamente.');
    }
}
