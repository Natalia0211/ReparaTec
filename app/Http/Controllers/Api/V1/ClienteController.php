<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Método para listar todos los clientes
        $clientes = Cliente::all();
        return response()->json($clientes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Método para almacenar un nuevo cliente
        $datos = $request->validate([
        'nombre' => ['required' , 'string' , 'max:255'],
        'apellidos' => ['required' , 'string' , 'max:255'],
        'telefono' => ['required' , 'string' , 'max:20'],
        'correo_electronico' => ['required', 'email', 'max:255', 'unique:clientes,Correo_electronico'],
        ]);

        $cliente = Cliente::create($datos);

        return response()->json(['success' => true, 'message' => 'Cliente creado con éxito'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //Método para mostrar un cliente en específico
        $cliente = Cliente::find($cliente);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        // Método para actualizar un cliente en específico
    
        $datos = $request->validate([
            'nombre' => ['required' , 'string' , 'max:255'],
            'apellidos' => ['required' , 'string' , 'max:255'],
            'telefono' => ['required' , 'string' , 'max:20'],
            'correo_electronico' => ['sometimes' , 'email', 'max:255' , 'unique:clientes,correo_electronico,' .$cliente->id],
        ]);

        $cliente->update($datos);

        return response()->json(['success' => true, 'message'=> 'Cliente actualizado con exito'], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        // Método para eliminar un cliente en específico

        $cliente->delete();

        return response()->json(['success' => true,'message' => 'Cliente eliminado con éxito'], 200);
    }
}