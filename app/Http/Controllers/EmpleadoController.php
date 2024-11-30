<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //Protegemos las rutas de este controlador con el middleware auth y admin (autenticado y rol de admin)
     public function __construct()
    {
            //Sólo los usuarios autenticados y con rol de admin pueden acceder a todos los métodos de este controlador
            $this->middleware('auth');
            $this->middleware('admin');
    }
    
    // Método para mostrar la lista de empleados
    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtener el término de búsqueda

        $empleados = Empleado::when($search, function ($query) use ($search) {
            $query->where('nombre', 'like', '%' . $search . '%')
                  ->orWhere('cargo', 'like', '%' . $search . '%');
        })->get(); // Filtrar según la búsqueda

        return view('empleados.index', compact('empleados'));
    }

    // Método para mostrar el formulario de creación de un nuevo empleado
    public function create()
    {
        return view('empleados.create');
    }

    // Método para almacenar un nuevo empleado
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo_electronico' => 'required|email|max:255|unique:empleados',
            'fecha_contratacion' => 'required|date',
        ]);

        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    // Método para mostrar el formulario de edición de un empleado
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    // Método para actualizar un empleado existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo_electronico' => 'required|email|max:255|unique:empleados,correo_electronico,' . $id,
            'fecha_contratacion' => 'required|date',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    // Método para eliminar un empleado
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
