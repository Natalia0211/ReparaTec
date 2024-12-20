<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //Protegemos las rutas de este controlador con el middleware auth y admin (autenticado y rol de admin)
    public function __construct()
    {
        //Sólo los usuarios autenticados y con rol de admin pueden acceder a todos los métodos de este controlador
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cliente::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%$search%")
                  ->orWhere('apellidos', 'like', "%$search%");
        }
    
        $clientes = $query->get();
        return view('clientes.index', compact('clientes'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra el formulario para crear un nuevo cliente
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Almacena un nuevo cliente en la base de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo_electronico' => 'required|email|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        // Muestra un cliente específico
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //Muestra el formulario para editar un cliente
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //Actualiza un cliente específico en la base de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo_electronico' => 'required|email|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        // Elimina un cliente específico de la base de datos
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}